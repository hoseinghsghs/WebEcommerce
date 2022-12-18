<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\ProductVariation;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Product;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\PaymentGateway\Zarinpal;
use App\PaymentGateway\Pay;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OtpSms;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use App\PaymentGateway\Payment as mPayment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;


class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        if (!Auth::check()) {
            alert()->error('ابتدا باید وارد شوید')->showConfirmButton('تایید');
            return redirect()->back();
        }
        if ($request->address_id && $request->address_id != 'new') {
            //آدرس دارد
            $validator = Validator::make($request->all(), [
                'address_id' => 'required|integer',
                'payment_method' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            };
            $address_id = $request->address_id;
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required|persian_alpha_num',
                'title' => ['required', 'persian_alpha_num', Rule::unique('user_addresses')->where(function ($query) {
                    $query->where('user_id', auth()->id());
                })],
                'cellphone' => 'required|ir_mobile:zero',
                'cellphone2' => 'required|ir_phone_with_code',
                'province_id' => 'required',
                'unit' => 'nullable|string',
                'city_id' => 'required|integer',
                'address' => 'required|string',
                'lastaddress' => 'required|string',
                'postal_code' => 'required|ir_postal_code:without_seprate',
                "payment_method" => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            };

            try {
                DB::beginTransaction();
                $user_address = UserAddress::create([
                    'user_id' => auth()->id(),
                    'title' => $request->title,
                    'name' => $request->name,
                    'unit' => $request->unit,
                    'cellphone' => $request->cellphone,
                    'cellphone2' => $request->cellphone2,
                    'province_id' => $request->province_id,
                    'city_id' => $request->city_id,
                    'address' => $request->address,
                    'lastaddress' => $request->address,
                    'postal_code' => $request->postal_code
                ]);
                DB::commit();
            } catch (\Exception $ex) {
                DB::rollBack();
                return ['error' => $ex->getMessage()];
            }
            $address_id = $user_address->id;
        }
        if ($request->description) {
            $description = $request->description;
        } else {
            $description = "بدون توضیح";
        }
        $ip = $request->ip();


        $checkCart = $this->checkCart();
        if (array_key_exists('error', $checkCart)) {
            alert()->error('', $checkCart['error'])->showConfirmButton('تایید');
            return redirect()->route('home');
        }

        $amounts = $this->getAmounts();
        if (array_key_exists('error', $amounts)) {
            alert()->error($amounts['error'], 'دقت کنید')->showConfirmButton('تایید');
            return redirect()->route('home');
        }

        if ($request->payment_method == 'mellat') {
            //create order
            $mellat_payment = new mPayment();
            $createOrder = $mellat_payment->createOrder($address_id, $amounts, '', 'mellat', $description, $ip);

            if (array_key_exists('error', $createOrder)) {
                alert()->error('', $createOrder['error'])->showConfirmButton('تایید');
                return redirect()->route('home');
            } else {
                // Create new invoice.
                $invoice = new Invoice;
                $invoice->amount('1200');
                $invoice->detail(['description' => $description]);
//                $invoice->uuid($createOrder['orderId']);

                return Payment::purchase($invoice, function ($driver, $transactionId) use ($mellat_payment, $createOrder) {
                    $mellat_payment->updateTransaction($createOrder['orderId'], $transactionId);
                })->pay()->render();

                /*$payGateway = new Mellat();

                $payGatewayResult = $payGateway->send($amounts, $address_id, $description, $ip);
                if (array_key_exists('error', $payGatewayResult)) {
                    alert()->error($payGatewayResult['error'])->showConfirmButton('تایید');
                    return redirect()->back();
                } else {
                    echo "<form name='myform' action='https://bpm.shaparak.ir/pgwchannel/startpay.mellat' method='POST'><input type='hidden' id='RefId' name='RefId' value='{$payGatewayResult['success']}'></form><script type='text/javascript'>window.onload = formSubmit; function formSubmit() { document.forms[0].submit(); }</script>";
                }*/
            }
        }

        if ($request->payment_method == 'paypal') {
            $payGateway = new Pay();
            $payGatewayResult = $payGateway->send($amounts, $address_id, $description, $ip);

            if (array_key_exists('error', $payGatewayResult)) {
                alert()->error($payGatewayResult['error'])->showConfirmButton('تایید');
                return redirect()->back();
            } else {
                Session::put('orderId', $payGatewayResult['orderId']);
                return redirect()->to($payGatewayResult['success']);
            }
        }

        if ($request->payment_method == 'zarinpal') {
            $zarinpalGateway = new Zarinpal();
            $zarinpalGatewayResult = $zarinpalGateway->send($amounts, $description, $address_id, $ip);

            if (array_key_exists('error', $zarinpalGatewayResult)) {
                alert()->error($zarinpalGatewayResult['error'])->showConfirmButton('تایید');
                return redirect()->back();
            } else {
                Session::put('orderId', $zarinpalGatewayResult['orderId']);
                return redirect()->to($zarinpalGatewayResult['success']);
            }
        }

        alert()->error('درگاه پرداخت انتخابی اشتباه میباشد', 'دقت کنید')->showConfirmButton('تایید');
        return redirect()->back();
    }


    public function paymentVerifyMellat(Request $request)
    {
        $mellat_payment = new mPayment();

        $transaction = Transaction::where('token', $request->RefId)->firstOrFail();
        Auth::loginUsingId($transaction->user_id);

        try {
            // You need to verify the payment to ensure the invoice has been paid successfully.
            // We use transaction id to verify payments
            // It is a good practice to add invoice amount as well.
            $receipt = Payment::amount($request->FinalAmount)->transactionId($request->RefId)->verify();
            $mellat_payment->updateOrder($request->RefId, $receipt->getReferenceId());
            Event::create([
                'title' => 'پرداخت نهایی انجام گرفت',
                'body' => 'آیدی کاربر' . " " . auth()->id() . " " . 'ملت',
                'user_id' => auth()->id(),
                'eventable_id' => auth()->id(),
                'eventable_type' => User::class,
            ]);
            Log::alert("پرداخت نهایی انجام گرفت", [
                'آیدی کاربر' => auth()->id(),
                'درگاه' => 'ملت',
            ]);
            Notification::route('cellphone', '09139035692')->notify(new OtpSms(auth()->user()->cellphone . "زرین پال سفارش جدید دارید"));
            Notification::route('cellphone', '09162418808')->notify(new OtpSms(auth()->user()->cellphone . "زرین پال سفارش جدید دارید"));
            alert()->success('خرید با موفقیت انجام گرفت')->showConfirmButton('تایید');
            return redirect()->route('home.user_profile.orders', ['order' => $transaction->order_id]);
//            echo $receipt->getReferenceId();

        } catch (InvalidPaymentException $exception) {
            /**
             * when payment is not verified, it will throw an exception.
             * We can catch the exception to handle invalid payments.
             * getMessage method, returns a suitable message that can be used in user interface.
             **/
            $mellat_payment->updateOrderErorr($request->RefId, $exception->getMessage());
            Event::create([
                'title' => 'پرداخت ناموفق',
                'body' => 'آیدی کاربر' . " " . auth()->id() . " " . 'ملت' . ' متن خطا: ' . $exception->getMessage(),
                'user_id' => auth()->id(),
                'eventable_id' => auth()->id(),
                'eventable_type' => User::class,
            ]);
            Log::alert("پرداخت با خطا مواجه شد", [
                'آیدی کاربر' => auth()->id(),
                'درگاه' => 'ملت',
            ]);
            return redirect()->route('home.user_profile.orders', ['order' => $transaction->order_id]);
//            echo $exception->getMessage();
        }

        /*$payGateway = new Mellat();
        $payGatewayResult = $payGateway->checkPayment($request->RefId, $request->ResCode, $request->SaleOrderId, $request->SaleReferenceId);
        if ($payGatewayResult == false) {
            alert()->error('خطا در پرداخت')->showConfirmButton('تایید');
            return redirect()->route('home.user_profile.orders', ['order' => $request->SaleOrderId]);
        } else {
            try {
                Event::create([
                    'title' => 'پرداخت نهایی انجام گرفت',
                    'body' => 'آیدی کاربر' . " " . auth()->id() . " " . 'ملت',
                    'user_id' => auth()->id(),
                    'eventable_id' => auth()->id(),
                    'eventable_type' => User::class,
                ]);
                Log::alert("پرداخت نهایی انجام گرفت", [
                    'آیدی کاربر' => auth()->id(),
                    'درگاه' => 'ملت',
                ]);
                Notification::route('cellphone', '09139035692')->notify(new OtpSms(auth()->user()->cellphone . "زرین پال سفارش جدید دارید"));
                Notification::route('cellphone', '09162418808')->notify(new OtpSms(auth()->user()->cellphone . "زرین پال سفارش جدید دارید"));
            } catch (\Throwable $th) {
            }

                alert()->success('خرید با موفقیت انجام گرفت')->showConfirmButton('تایید');
                return redirect()->route('home.user_profile.orders', ['order' =>$request->SaleOrderId ]);
            }*/
    }

    public function paymentVerify(Request $request, $gatewayName)
    {

        if ($gatewayName == 'pay') {
            $payGateway = new Pay();

            $payGatewayResult = $payGateway->verify($request->token, $request->status);
            if ($payGatewayResult == null) {
                alert()->error('پرداخت با مشکل مواجه شد');

                return redirect()->back();
            } else {
                if (array_key_exists('error', $payGatewayResult)) {
                    alert()->error($payGatewayResult['error'])->showConfirmButton('تایید');
                    return redirect()->route('home.user_profile.orders', ['order' => Session::pull('orderId')]);
                } else {
                    alert()->success('خرید با موفقیت انجام گرفت')->showConfirmButton('تایید');
                    try {
                        Event::create([
                            'title' => 'پرداخت نهایی انجام گرفت',
                            'body' => 'آیدی کاربر' . " " . auth()->id() . " " . "پی پل",
                            'user_id' => auth()->id(),
                            'eventable_id' => auth()->id(),
                            'eventable_type' => User::class,
                        ]);
                        Log::alert("پرداخت نهایی انجام گرفت", [
                            'آیدی کاربر' => auth()->id(),
                            'درگاه' => 'پی پل',

                        ]);
                    } catch (\Throwable $th) {
                    }

                    try {
                        Notification::route('cellphone', '09139035692')->notify(new OtpSms(auth()->user()->cellphone . "زرین پال سفارش جدید دارید"));
                        Notification::route('cellphone', '09162418808')->notify(new OtpSms(auth()->user()->cellphone . "زرین پال سفارش جدید دارید"));
                    } catch (\Throwable $th) {
                    }

                    try {
                        return redirect()->route('home.user_profile.orders', ['order' => Session::pull('orderId')]);
                    } catch (\Throwable $th) {
                        return redirect()->route('home.user_profile.ordersList');
                    }
                }
            }
        }

        if ($gatewayName == 'zarinpal') {
            $amounts = $this->getAmounts();
            if (array_key_exists('error', $amounts)) {
                alert()->error($amounts['error'], 'دقت کنید');
                return redirect()->route('home');
            }

            $zarinpalGateway = new Zarinpal();
            $zarinpalGatewayResult = $zarinpalGateway->verify($request->Authority, $amounts['paying_amount']);
            if (array_key_exists('error', $zarinpalGatewayResult)) {
                alert()->error($zarinpalGatewayResult['error'])->showConfirmButton('تایید');
                return redirect()->route('home.user_profile.orders', ['order' => Session::pull('orderId')]);
            } else {
                try {
                    Event::create([
                        'title' => 'پرداخت نهایی انجام گرفت',
                        'body' => 'آیدی کاربر' . " " . auth()->id() . " " . 'زرین پال',
                        'user_id' => auth()->id(),
                        'eventable_id' => auth()->id(),
                        'eventable_type' => User::class,
                    ]);
                    Log::alert("پرداخت نهایی انجام گرفت", [
                        'آیدی کاربر' => auth()->id(),
                        'درگاه' => 'زرین پال',
                    ]);
                } catch (\Throwable $th) {
                }

                try {
                    Notification::route('cellphone', '09139035692')->notify(new OtpSms(auth()->user()->cellphone . "زرین پال سفارش جدید دارید"));
                    Notification::route('cellphone', '09162418808')->notify(new OtpSms(auth()->user()->cellphone . "زرین پال سفارش جدید دارید"));
                } catch (\Throwable $th) {
                }
                alert()->success('خرید با موفقیت انجام گرفت')->showConfirmButton('تایید');
                return redirect()->route('home.user_profile.orders', ['order' => Session::pull('orderId')]);
            }
        }

        alert()->error('مسیر بازگشت از درگاه پرداخت اشتباه می باشد', 'دقت کنید')->showConfirmButton('تایید');
        return redirect()->route('home.orders.checkout');
    }

    public function checkCart()
    {

        if (\Cart::isEmpty()) {
            return ['error' => 'سبد خرید شما خالی می باشد'];
        }
        foreach (\Cart::getContent() as $item) {
            $variation = ProductVariation::find($item->attributes->id);
            $price = $variation->is_sale ? $variation->sale_price : $variation->price;

            if (!Product::find($item->attributes->product_id)->is_active) {
                \Cart::clear();
                return ['error' => 'محصول مورد نظر یافت نشد'];
            }
            if ($item->price != $price) {
                \Cart::clear();
                return ['error' => 'قیمت محصول تغییر پیدا کرد'];
            }
            if ($item->quantity > $variation->quantity) {
                \Cart::clear();
                return ['error' => 'تعداد محصول تغییر پیدا کرد'];
            }
        }
        return ['success' => 'success!'];
    }

    public function getAmounts()
    {
        if (session()->has('coupon')) {
            $checkCoupon = checkCoupon(session()->get('coupon.code'));
            if (array_key_exists('error', $checkCoupon)) {
                return $checkCoupon;
            }
        }
        return [
            'total_amount' => (\Cart::getTotal() + cartTotalSaleAmount()),
            'delivery_amount' => cartTotalDeliveryAmount(),
            'coupon_amount' => session()->has('coupon') ? session()->get('coupon.amount') : 0,
            'paying_amount' => cartTotalAmount()
        ];
    }

    public function checkCoupon(Request $request)
    {
        if (!auth()->check()) {
            return response('error', 400);
        };

        if ($request->code == null) {
            return response(['message' => 'فیلد کد تخفیف خالی است'], 201);
        };
        $result = checkCoupon($request->code);

        if (array_key_exists('error', $result)) {

            return response()->json(['message' => $result['error']], 201);
        } else {
            return response()->json(['message' => $result['amount'], 'total_amounts' => cartTotalAmount()], 200);
        }
    }
}
