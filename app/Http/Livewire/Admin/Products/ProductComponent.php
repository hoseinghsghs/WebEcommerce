<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProductComponent extends Component
{
    use WithFileUploads, WithPagination;

    public $title;
    public $product;

    protected $paginationTheme = 'bootstrap';
    public $name;
    public $category;
    public $status;

    public function updatingName()
    {
        $this->resetPage();
    }

    public function updatingCategory()
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

    protected $listeners = [
        'sweetAlertConfirmed', // only when confirm button is clicked
    ];

    public function mount(Product $product)
    {

    }
    // public function delproduct(product $product){

    // $this->product=$product;
    //     sweetAlert()
    //     ->livewire()
    //     ->showDenyButton(true,'انصراف')->confirmButtonText("تایید")
    //     ->addInfo('از حذف رکورد مورد نظر اطمینان دارید؟');

    // }

    public function ChangeActive_product(Product $product)
    {
        $product->update([
            "is_active" => !$product->is_active
        ]);
    }

    public function ChangeArchive_product(Product $product)
    {
        $product->update([
            "is_archive" => true
        ]);
    }

    // public function sweetAlertConfirmed(array $data)
    // {
    //     foreach ($this->product->images as $value) {

    //     if (Storage::exists("other_product_image/" .  $value->image)) {

    //     Storage::delete("other_product_image/" .  $value->image);
    //     };
    //     }

    //     if (Storage::exists("primary_image/" .  $this->product->primary_image)) {
    //         Storage::delete("primary_image/" .  $this->product->primary_image);
    //     };

    //     $this->product->delete();
    //         toastr()->livewire()->addSuccess('محصول با موفقیت حذف شد');
    // }
    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->name . '%')
            ->where('category_id', 'like', '%' . $this->category . '%')
            ->where('is_active', 'like', '%' . $this->status . '%')
            ->where('is_archive', 0)->latest()
            ->paginate(10);

        return view('livewire.admin.products.product-component', ['products' => $products, 'categories' => Category::all()]);
    }
}
