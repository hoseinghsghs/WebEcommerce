<?php

namespace App\Http\Livewire\Home\Cart;

use Livewire\Component;

class ShowCart extends Component
{
    
    public $price;
    public $quantity;
    public $code;
    protected $listeners = ['delete' => 'delete'];
    
    protected $rules = [
        'code' => 'required|exists:coupons,code',
    ];
    
    public function mount()
    {
        
    }

    public function increment($rowId)
    {
    
        
        if(!\Cart::get($rowId) == null){
            $item = \Cart::get($rowId);

            if ($item->quantity > $item->attributes->quantity-1) {

                \Cart::update($rowId, [
                    'quantity' => 0
                ]);
            }else{

                \Cart::update($rowId, [
                    'quantity' => 1
                ]);
            }
        }else{
           
            if(\Cart::remove($rowId)){
                \Cart::remove($rowId);
            toastr()->livewire()->addError('محصول از سبد خرید حذف شده ');
    
            }
        }   
    }

    //کاهش
    public function decrement($rowId){
    if(!\Cart::get($rowId) == null){
                \Cart::update($rowId, [
                    'quantity' => -1
                ]);
        }else{
                \Cart::remove($rowId);
                toastr()->livewire()->addError('محصول از سبد خرید حذف شده ');
        }
    }

    public function delete($rowId)
    {
        if(!\Cart::get($rowId) == null){

            $this->dispatchBrowserEvent('say-goodbye', ['rowId' => $rowId , 'price' => \Cart::getTotal()]);

            \Cart::remove($rowId);
            toastr()->livewire()->addSuccess('محصول مورد نظر حذف گردید');
            }else{
            \Cart::remove($rowId);
            toastr()->livewire()->addError('محصول از سبد خرید حذف شده ');
    }
      


    }

    public function clearCart()
    {
        \Cart::clear();
        toastr()->livewire()->addSuccess('سبد خرید حذف شد');

    }

    
    //coupon
    public function checkCoupon()
    {
        $this->validate([
            'code' => 'required|exists:coupons,code',
        ]);
        
  

        if (!auth()->check()) {
           return toastr()->livewire()->addError('برای استفاده از کد تخفیف نیاز هست ابتدا وارد وب سایت شوید');
        }

        $result = checkCoupon($this->code);
        if (array_key_exists('error', $result)) {
            return toastr()->livewire()->addError($result['error']);
        } else {
            return toastr()->livewire()->addSuccess($result['success']);
        }
    }
    

    public function render()
    {
        return view('livewire.home.cart.show-cart',['cartitems'=>\Cart::getContent()])
        ->extends('home.layout.MasterHome')
        ->section('content');
        
    }
}