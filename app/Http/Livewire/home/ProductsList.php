<?php

namespace App\Http\Livewire\Home;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsList extends Component
{
    use WithPagination;

    public $category;
    public $routeName = '';
    public $collapsible = [
        'categories' => true,
        'price' => true,
        'variation' => [],
        'attribute' => [],
    ];
    public $filterd = [
        'variation' => [],
        'attribute' => [],
        'orderBy' => 'default',
        'price' => ['high' => null, 'low' => null],
        'displayCount' => 12,
        'search' => '',
    ];

    public function mount($slug = null)
    {
        $this->routeName = Route::currentRouteName();
        if (Route::currentRouteName() == 'home.products.index') {
            $this->category = Category::where('parent_id', '<>', 0)->where('slug', $slug)->firstOrFail();
        } elseif ($slug) {
            $this->category = Category::where('parent_id', 0)->where('slug', $slug)->firstOrFail();
        }

        request()->whenFilled('q', function () {
            $this->filterd['search'] = request()->query('q');
        });
    }

    public function resetFilters()
    {
        $this->reset('filterd');
    }

    public function updatingFilterdPriceHigh($field, $value)
    {
        $this->resetPage();
    }
    public function updatingFilterdPriceLow($field, $value)
    {
        $this->resetPage();
    }
    public function updatingFilterdDisplayCount($field, $value)
    {
        $this->resetPage();
    }
    public function updatingFilterdOrderBy($field, $value)
    {
        $this->resetPage();
    }

    public function collapse($type, $id = null)
    {
        if ($type == 'variation' || $type == 'attribute') {
            if (in_array($id, $this->collapsible[$type])) {
                $this->collapsible[$type] = array_diff($this->collapsible[$type], [$id]);
            } else {
                $this->collapsible[$type][] = $id;
            }
        } else {
            $this->collapsible[$type] = !$this->collapsible[$type];
        }
    }

    public function addFilter($type, $attribute_id, $value)
    {

        $filterd = $this->filterd;

        if (array_key_exists($attribute_id, $filterd[$type])) {
            $res = array_search($value, $filterd[$type][$attribute_id]);

            if ($res !== false) {
                array_splice($filterd[$type][$attribute_id], $res, 1);

                if (count($filterd[$type][$attribute_id]) == 0) {
                    unset($filterd[$type][$attribute_id]);
                }
            } else {
                array_push($filterd[$type][$attribute_id], $value);
            }
        } else {
            $filterd[$type][$attribute_id][] = $value;
        }
        $this->filterd = $filterd;
        $this->gotoPage(1);
    }

    public function render()
    {
        if ($this->routeName == 'home.products.index') {
            $attributes = $this->category->attributes()->where('is_filter', 1)->has('categoryValues')->with('categoryValues')->get();
            $variation = $this->category->attributes()->where('is_variation', 1)->with('variationValues')->first();
            $products = $this->category->products()->filter($this->filterd)->paginate($this->filterd['displayCount']);
            return view('livewire.home.products-list', compact('attributes', 'variation', 'products'))->extends('home.layout.MasterHome');
        } elseif ($this->routeName == 'home.products.search' && isset($this->category)) {

            $attributes = $this->category->attributes()->where('is_filter', 1)->has('categoryValues')->with('categoryValues')->get();
            $products = $this->category->productsFromParent()->filter($this->filterd)->paginate($this->filterd['displayCount']);
            return view('livewire.home.products-list', compact('attributes', 'products'))->extends('home.layout.MasterHome');
        } else {
            $products = Product::filter($this->filterd)->paginate($this->filterd['displayCount']);
            $categories = Category::where('parent_id', 0)->get();
            return view('livewire.home.products-list', compact('categories', 'products'))->extends('home.layout.MasterHome');
        }
    }
}
