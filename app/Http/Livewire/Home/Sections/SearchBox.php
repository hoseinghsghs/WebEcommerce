<?php

namespace App\Http\Livewire\Home\Sections;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;
use Illuminate\Support\Facades\Route;

class SearchBox extends Component
{
    public $search;
    public $categoryId;
    public $category;
    public $category_children_ids;
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
            if (request()->route('slug')) {
                $category = Category::active()->where('slug', request()->route('slug'))->firstOrFail();
                $this->categoryId = $category->id;
                $this->category = $category;
                $this->category_children_ids=category_children($category)->pluck('id')->all();
            }
        }
    }

    public function updatedCategoryId($id)
    {
        if ($id) {
            $this->category = Category::active()->findOrFail($id);
            $this->validate();
            $this->category_children_ids=category_children($this->category)->pluck('id')->all();
            $this->products = Product::whereIn('category_id', $this->category_children_ids)->active()
                ->where('products.name', 'like', '%' . $this->search . '%')->with('category.parent')->take(10)->get();
        } else {
            $this->category = null;
            $this->category_children_ids=null;
            $this->validate();
            $this->products = Product::active()->where('name', 'like', '%' . $this->search . '%')->with('category.parent')->take(10)->get();
        }
    }

    public function updatedSearch($search)
    {
        $this->validate();
        if ($this->categoryId) {
            $this->products = Product::whereIn('category_id', $this->category_children_ids)->active()->where('products.name', 'like', '%' . $search . '%')->with('category.parent')->take(10)->get();
        } else {
            $this->products = Product::active()->where('name', 'like', '%' . $search . '%')->with('category.parent')->take(10)->get();
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
        return view('livewire.home.sections.search-box', ['sProducts' => $this->products, 'categories' => Category::active()->where('parent_id', 0)->get()]);
    }
}
