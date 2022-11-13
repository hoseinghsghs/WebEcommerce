<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Models\Coupon;
use Livewire\Component;

class CouponList extends Component
{

public $title;
public $coupon;
protected $listeners = [
    'sweetAlertConfirmed', // only when confirm button is clicked
];

public function mount(Coupon $coupon)
{ 
    if($coupon->is_active == 0){
      
           $this->title="عدم انتشار";
           $this->color="danger";

    }else{
       
           $this->title="انتشار";
           $this->color="success";

        }
}
      
            public function render()
            {
                return view('livewire.admin.coupons.coupon-list',['coupons' => Coupon::latest()->paginate(10)]);
            }
            
    public function delcoupon(Coupon $coupon){

      $this->coupon=$coupon;
        sweetAlert()
        ->livewire()
        ->showDenyButton(true,'انصراف')->confirmButtonText("تایید")
        ->addInfo('از حذف رکورد مورد نظر اطمینان دارید؟');
       
    }

   public function ChengeActive_coupon (Coupon $coupon){
       

    if($coupon->is_active){
        $coupon->update([
            "is_active"=> false
           ]);
           $this->title="عدم انتشار";
           $this->color="danger";

    }else{
        $coupon->update([
            "is_active"=> true
           ]);
           $this->title="انتشار";
           $this->color="success";

        }
        
     }
     
     public function sweetAlertConfirmed(array $data)
     { 
        
        $this->coupon->delete();
             toastr()->livewire()->addSuccess('کد تخفیف با موفقیت حذف شد');
     }



}