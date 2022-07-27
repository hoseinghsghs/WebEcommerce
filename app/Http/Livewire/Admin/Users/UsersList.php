<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search='';

    protected $rules = [
        'search' => 'nullable|string',
    ];

    public function updatedSearch($search)
    {
        $this->validate();
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.users.users-list', ['users' => User::where('name', 'like', '%' . $this->search . '%')
        ->orWhere('email', 'like', '%' . $this->search . '%')
        ->orWhere('cellphone', 'like', '%' . $this->search . '%')->paginate(10)]);
    }
}
