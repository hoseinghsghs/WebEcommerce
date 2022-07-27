<?php

namespace App\Http\Livewire\Home\Sections;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Route;

class SearchBox extends Component
{
    public $search;
    public $categoryId;
    public $category;
    public $products;

    protected $rules = [
        'search' => 'required|string|min:3',
    ];

    public function mount()
    {
        if (Route::currentRouteName() == 'home.products.search') {
            request()->whenFilled('q', function () {
                $this->search = request()->query('q');
            });
            // dd(request()->route('slug'));
            if (request()->route('slug')) {
                $category=Category::where('slug', request()->route('slug'))->firstOrFail();
                $this->categoryId = $category->id;
                $this->category = $category;
            }
        }
    }

    public function updatedCategoryId($id)
    {
        if ($id) {
            $this->category = Category::findOrFail($id);
            $this->validate();
            $this->products = $this->category->productsFromParent()->where('products.name', 'like', '%' . $this->search . '%')->with('category.parent')->take(10)->get();
        } else {
            $this->category = null;
            $this->validate();
            $this->products = Product::where('name', 'like', '%' . $this->search . '%')->with('category.parent')->take(10)->get();
        }
    }
    public function updatedSearch($search)
    {
        $this->validate();
        if ($this->categoryId) {
            $this->products = $this->category->productsFromParent()->where('products.name', 'like', '%' . $search . '%')->with('category.parent')->take(10)->get();
        } else {
            $this->products = Product::where('name', 'like', '%' . $search . '%')->with('category.parent')->take(10)->get();
        }
    }
    public function search()
    {
        if ($this->categoryId) {
            redirect()->route('home.products.search', ['slug' => $this->category->slug, 'q' => $this->search]);
        } else {
            redirect()->route('home.products.search', ['q' => $this->search]);
        }
    }

    public function render()
    {
        return view('livewire.home.sections.search-box', ['sProducts' => $this->products, 'categories' => Category::where('parent_id', 0)->get()]);
    }
}
