<?php

namespace App\Http\Livewire\Admin\Attributes;

use App\Models\Attribute;
use Livewire\Component;
use Livewire\WithPagination;

class AttributeList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'sweetAlertConfirmed', // only when confirm button is clicked
    ];

    public $attribute_name;
    public $attribute;
    public $is_edit = false;
    public $display;

    public function ref()
    {
        $this->is_edit = false;
        $this->reset("attribute_name");
        $this->reset("display");
        $this->resetValidation();

    }

    public function edit_attribute(Attribute $attribute)
    {
        $this->is_edit = true;
        $this->attribute_name = $attribute->name;
        $this->attribute = $attribute;
        $this->display = "disabled";
    }

    public function del_attribute(Attribute $attribute)
    {
        $this->attribute=$attribute;
        sweetAlert()
            ->livewire()
            ->showDenyButton(true,'انصراف')->confirmButtonText("تایید")
            ->addInfo('از حذف رکورد مورد نظر اطمینان دارید؟');

    }
    public function sweetAlertConfirmed(array $data)
    {
            $this->attribute->delete();
            toastr()->livewire()->addSuccess('ویژگی با موفقیت حذف شد');
    }

    public function addAttribute()
    {

        if ($this->is_edit) {

            $this->validate([
                'attribute_name' => 'required|string|max:50|unique:attributes,name,'.$this->attribute->id
            ],[],['attribute_name'=>'عنوان']);

            $this->attribute->update([
                'name' => $this->attribute_name,
            ]);
            $this->is_edit = false;
            $this->reset("attribute_name");
            $this->reset("display");
            toastr()->livewire()->addSuccess('تغییرات با موفقیت ذخیره شد');
        } else {
            $this->validate([
                'attribute_name' => 'required|string|max:50|unique:attributes,name'
            ],[],['attribute_name'=>'عنوان']);
            Attribute::create([

                "name" => $this->attribute_name,
            ]);
            $this->reset("attribute_name");
            toastr()->livewire()->addSuccess('ویژگی با موفقیت ایجاد شد');

        }
    }

    public function render()
    {
        return view('livewire.admin.attributes.attribute-list',['attributes'=>Attribute::latest()->paginate(10)]);
    }
}
