<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class OrderList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap'; 
    public $name;
    public $paying_amount;
    public $payment_status;
    public $status;
    
    public function updatingName()
    {
        $this->resetPage();
    }
    
    public function updatingPayingAmount()
    {
        $this->resetPage();
    }

    public function updatingPaymentStatus()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }
    public function render()
    {

        $user_name=User::where('name','like','%'.$this->name.'%')->pluck('id')->toArray();
        $orders=Order::whereIn('user_id',$user_name)
        ->where('paying_amount','like','%'.$this->paying_amount.'%')
        ->where('payment_status','like','%'.$this->payment_status.'%')
        ->where('status','like','%'.$this->status.'%')->paginate(10);
        
        return view('livewire.admin.orders.order-list',compact('orders'));
    }
}