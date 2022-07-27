<?php

namespace App\Http\Livewire\Admin\Brands;
use Livewire\Component;
use App\Models\Brand;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class BrandControll extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    
    public function render()
    {
        return view('livewire.admin.brands.brand-controll',['brands'=>Brand::latest()->paginate(10)]);
    }

    public function delbrand(Brand $brand){

        if (Storage::exists('brands/' . $brand->image)) {
            Storage::delete('brands/' . $brand->image);
        };
        $brand->delete();
    }

   public function Inactive_brand (Brand $brand){

       $brand->update([
        "is_active"=> false
       ]);

   }
   public function active_brand (Brand $brand){

    $brand->update([
     "is_active"=> true
    ]);

}

}