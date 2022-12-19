<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
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
    public $code;
    public $taskup;
    public $endDate;
    public $startDate;

    public function updatingName()
    {
        dd($this->status,$this->payment_status);

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
        if ($this->startDate) {
            try {
                $start = Verta::parse(convert($this->startDate))->formatGregorian('Y-n-j');
            } catch (\Throwable $th) {
                $start = Verta::parse(convert('1300-01-01'))->formatGregorian('Y-n-j');
            }
        } else {
            $start = Verta::parse(convert('1300-01-01'))->formatGregorian('Y-n-j');
        }
        if ($this->endDate) {
            try {
                $end = Verta::parse(convert($this->endDate))->formatGregorian('Y-n-j');
            } catch (\Throwable $th) {
                $end = Verta::parse(convert('1500-01-01'))->formatGregorian('Y-n-j');
            }
        } else {
            $end = Verta::parse(convert('1500-01-01'))->formatGregorian('Y-n-j');
        }


        $user_name = User::where('name', 'like', '%' . $this->name . '%')->pluck('id')->toArray();
        $user_phone = User::where('cellphone', 'like', '%' . $this->name . '%')->pluck('id')->toArray();
        $combine = array_merge($user_name, $user_phone);

        $orders = Order::when(count($combine) > 0, function ($query) use ($combine) {
            $query->whereIn('user_id', $combine);
        })->when($this->paying_amount, function ($query) {
            $query->where('paying_amount', 'like', '%' . $this->paying_amount . '%');
        })->when($this->code, function ($query) {
            $query->where('id', 'like', '%' . $this->code . '%');
        })->when(isset($this->payment_status), function ($query) {
            $query->where('payment_status',(int) $this->payment_status );
        })->when(isset($this->status), function ($query) {
            $query->where('status', (int) $this->status);
        })->when($start & $end, function ($query) use ($start, $end) {
            $query->WhereBetween('created_at', [$start, $end]);
        })->latest()->paginate(10);


        return view('livewire.admin.orders.order-list', compact('orders'));
    }
}
