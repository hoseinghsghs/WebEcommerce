<?php

namespace App\PaymentGateway;

use App\Events\NotificationMessage;
use App\Models\Event;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\ProductVariation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Payment
{
    public function createOrder($addressId, $amounts, $token, $gateway_name , $description)
    {
        try {
            DB::beginTransaction();

            $order = Order::create([
                'user_id' => auth()->id(),
                'address_id' => $addressId,
                'description' => $description,
                'coupon_id' => session()->has('coupon') ? session()->get('coupon.id') : null,
                'total_amount' => $amounts['total_amount'],
                'delivery_amount' => $amounts['delivery_amount'],
                'coupon_amount' => $amounts['coupon_amount'],
                'paying_amount' => $amounts['paying_amount'],
                'payment_type' => 'online',
            ]);

            foreach (\Cart::getContent() as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->associatedModel->id,
                    'product_variation_id' => $item->attributes->id,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'subtotal' => ($item->quantity * $item->price)
                ]);
            }

            Transaction::create([
                'user_id' => auth()->id(),
                'order_id' => $order->id,
                'amount' => $amounts['paying_amount'],
                'token' => $token,
                'gateway_name' => $gateway_name
            ]);

           $event= Event::create([
                'title' => 'سفارش جدید ثبت شد',
                'body' => 'شماره سفارش' . " " . $order->id ." ". 'آیدی کاربر' ." ".auth()->id() ,
                'user_id' => auth()->id(),
                'eventable_id' => $order->id,
                'eventable_type' => Order::class,
            ]);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return ['error' => $ex->getMessage()];
        }

        try {
            broadcast(new NotificationMessage($event))->toOthers();
           
        } catch (\Throwable $th) {
            
        }
        try {
            Log::info("سفارش جدید ثیت شد" , [
                'title' => 'سفارش جدید ثبت شد',
                'body' => 'شماره سفارش' . " " . $order->id ." ". 'آیدی کاربر' ." ".auth()->id() ,
                'user_id' => auth()->id() ." "."شماره تماس". auth()->user()->cellphone,
                'eventable_id' => $order->id,
                'eventable_type' => Order::class,
            ]);
        } catch (\Throwable $th) {
        }

        return ['success' => 'success!' , 'orderId' => $order->id];
    }

    public function updateOrder($token, $refId)
    {
        try {
            DB::beginTransaction();

            $transaction = Transaction::where('token', $token)->firstOrFail();

            $transaction->update([
                'status' => 1,
                'ref_id' => $refId
            ]);

            $order = Order::findOrFail($transaction->order_id);
            $order->update([
                'payment_status' => 1,
                'status' => 1
            ]);

            foreach (\Cart::getContent() as $item) {
                $variation = ProductVariation::find($item->attributes->id);
                $variation->update([
                    'quantity' => $variation->quantity - $item->quantity
                ]);
            }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return ['error' => $ex->getMessage()];
        }

        return ['success' => 'success!'];
    }
    public function updateOrderErorr($token,$result)
    {
        $transaction = Transaction::where('token', $token)->firstOrFail();

        $transaction->update([
            'description_erorr' => $result
        ]);
    }
}