<?php

namespace App\Http\Livewire\Admin\Transaction;

use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap'; 
    public $name;
    public $amount;
    public $ref_id;
    public $status;
    
    public function updatingName()
    {
        $this->resetPage();
    }
    
    public function updatingPayingAmount()
    {
        $this->resetPage();
    }

    public function updatingRefId()
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
        $transactions = Transaction::whereIn('user_id',$user_name)
        ->where('amount','like','%'.$this->amount.'%')
        ->when ($this->ref_id, function ($query) {
            return $query->where('ref_id', 'like', '%' . $this->ref_id . '%');
        })
        ->where('status','like','%'.$this->status.'%')
        ->paginate(10);
        
        return view('livewire.admin.transaction.transaction-list' , compact('transactions'));
    }
}