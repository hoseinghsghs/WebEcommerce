<?php

namespace App\Http\Livewire\Admin\Permissions;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class PermissionList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'sweetAlertConfirmed', // only when confirm button is clicked
    ];

    public $display_name;
    public $name;
    public $permission;
    public $is_edit = false;
    public $display;

    protected $rules = [
        'name' => 'required|unique:permissions',
        'display_name' => 'required|unique:permissions',
    ];

    protected $validationAttributes = [
        'name' => 'نام مجوز',
        'display_name' => 'نام نمایشی',
    ];

    public function ref()
    {
        $this->is_edit = false;
        $this->reset("display_name");
        $this->reset("name");
        $this->reset("display");
        $this->resetValidation();
    }

    public function edit_permission(Permission $permission)
    {
        $this->is_edit = true;
        $this->display_name = $permission->display_name;
        $this->name = $permission->name;
        $this->permission = $permission;
        $this->display = "disabled";
    }

    public function del_permission(Permission $permission)
    {
        $this->permission = $permission;
        sweetAlert()
            ->livewire()
            ->showDenyButton(true, 'انصراف')->confirmButtonText("تایید")
            ->addInfo('از حذف رکورد مورد نظر اطمینان دارید؟');
    }
    public function sweetAlertConfirmed(array $data)
    {
        $this->permission->delete();
        toastr()->livewire()->addSuccess('ویژگی با موفقیت حذف شد');
    }

    public function addPermission()
    {
        if ($this->is_edit) {

            $data = $this->validate([
                'name' => 'required|unique:permissions,name,' . $this->permission->id,
                'display_name' => 'required|unique:permissions,display_name,' . $this->permission->id,
            ]);

            $this->permission->update($data);

            $this->is_edit = false;
            $this->reset("display_name");
            $this->reset("name");
            $this->reset("display");

            toastr()->livewire()->addSuccess('تغییرات با موفقیت ثبت شد');
        } else {
            $data=$this->validate();

            $data['guard_name'] = 'web';
            Permission::create($data);

            $this->reset("display_name");
            $this->reset("name");
            toastr()->livewire()->addSuccess('مجوز با موفقیت ایجاد شد');
        }
    }
    public function render()
    {
        return view('livewire.admin.permissions.permission-list',['permissions'=>Permission::latest()->paginate(10)]);
    }
}
