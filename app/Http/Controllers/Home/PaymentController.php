<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\ProductVariation;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\PaymentGateway\Zarinpal;
use App\PaymentGateway\Pay;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{

public function payment(Request $request)
{
    if (!Auth::check()) {
    alert()->error('ابتدا باید وارد شوید');
    return redirect()->back(); 
    }
    if($request->address_id && $request->address_id != 'new'){
    //آدرس دارد 
    
    $validator = Validator::make($request->all(), [
            'address_id' => 'required|integer',
            'payment_method' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        };
        $address_id= $request->address_id;
    }else{
        $validator = Validator::make($request->all(), [
            'title' =>'required',
            "name" => 'required',
            "cellphone" => 'required',
            "cellphone2" => 'required',
            "province_id" => "required",
            "unit" => 'required',
            "postal_code" => 'required',
            "address" => 'required',
            "lastaddress" => 'required',
            "payment_method" => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        };

        try {
            DB::beginTransaction();
           $user_address= UserAddress::create([
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
        $address_id= $user_address->id;
    
        }
        if($request->description){
            $description=$request->description;
        }else{
            $description="بدون توضیح";
        }


    $checkCart = $this->checkCart();
    if (array_key_exists('error', $checkCart)) {
        alert()->error($checkCart['error'], 'دقت کنید');
        return redirect()->route('home');
    }

    $amounts = $this->getAmounts();
    if (array_key_exists('error', $amounts)) {
        alert()->error($amounts['error'], 'دقت کنید');
        return redirect()->route('home');
    }

    if ($request->payment_method == 'paypal') {
        $payGateway = new Pay();
        $payGatewayResult = $payGateway->send($amounts, $address_id , $description);

        
       
        Session::put('orderId',$payGatewayResult['orderId']);

        if (array_key_exists('error', $payGatewayResult)) {
            alert()->error($payGatewayResult['error'], 'دقت کنید')->persistent('حله');
            return redirect()->back();
        } else {
            return redirect()->to($payGatewayResult['success']);
        }
    }

    if ($request->payment_method == 'zarinpal') {
        $zarinpalGateway = new Zarinpal();
        $zarinpalGatewayResult = $zarinpalGateway->send($amounts, $description, $address_id);

        Session::put('orderId',$zarinpalGatewayResult['orderId']);

        if (array_key_exists('error', $zarinpalGatewayResult)) {
            alert()->error($zarinpalGatewayResult['error'], 'دقت کنید')->persistent('حله');
            return redirect()->back();
        } else {
            return redirect()->to($zarinpalGatewayResult['success']);
        }
    }

    alert()->error('درگاه پرداخت انتخابی اشتباه میباشد', 'دقت کنید');
    return redirect()->back();
}

public function paymentVerify(Request $request, $gatewayName)
{
    if ($gatewayName == 'pay') {
        $payGateway = new Pay();
        
        $payGatewayResult = $payGateway->verify($request->token, $request->status);

        if (array_key_exists('error', $payGatewayResult)) {
            alert()->error($payGatewayResult['error'])->persistent('حله');
            return redirect()->route('home.user_profile.orders',['order' => Session::pull('orderId')]);
        } else {
            alert()->success('خرید با موفقیت انجام گرفت', 'با تشکر');
            return redirect()->route('home.user_profile.orders',['order' => Session::pull('orderId')]);
            
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
            alert()->error($zarinpalGatewayResult['error'])->persistent('حله');
            return redirect()->route('home.user_profile.orders',['order' => Session::pull('orderId')]);
        } else {
            alert()->success('خرید با موفقیت انجام گرفت', 'با تشکر');
            return redirect()->route('home.user_profile.orders',['order' => Session::pull('orderId')]);
        }
    }

    alert()->error('مسیر بازگشت از درگاه پرداخت اشتباه می باشد', 'دقت کنید');
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
       return response('error' , 400);
    };

    if($request->code == null){
        return response(['message'=>'فیلد کد تخفیف خالی است' ] , 201);
    };
    $result = checkCoupon($request->code);
    
    if (array_key_exists('error', $result)) {
        
        return response()->json(['message'=>$result['error']] , 201);
        
    } else {
        return response()->json(['message'=>$result['amount'] ] , 200);
      
    }
}

}