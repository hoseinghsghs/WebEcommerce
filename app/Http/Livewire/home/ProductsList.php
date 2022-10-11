<?php

namespace App\Http\Livewire\Home;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Setting;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithPagination;
class ProductsList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['priceRangeUpdated'];
    public $category;
    public $routeName = '';
    public $initialFilter;

    public $filterd = [
        'variation' => [],
        'attribute' => [],
        'orderBy' => 'default',
        'price' => ['high' => 5000000, 'low' => 0],
        'displayCount' => 12,
        'search' => '',
        'tag'=>null,
    ];

    public function seoparameter()
    {
        $settings = Setting::findOrNew(1);
        SEOTools::setDescription($settings->description);
        SEOTools::opengraph()->setUrl(env('APP_URL'));
        OpenGraph::addImage(asset('storage/logo/' . $settings->logo));
        OpenGraph::addProperty('site_name', env('APP_NAME'));
        OpenGraph::addProperty('locale', 'fa');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@metawebs_ir');
        SEOTools::jsonLd()->addImage(asset('storage/logo/' . $settings->logo));
    }
    
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
        request()->whenFilled('tag', function () {
            $this->filterd['tag'] = request()->query('tag');
        });
        // get maximum of price
        $max_price = ProductVariation::max('price');
        if ($max_price) {
            $price_rank = 10 ** floor(log10($max_price));
            $round_max = ceil($max_price / $price_rank) * $price_rank;
            $this->filterd['price']['high'] = $round_max;
        }

        $this->initialFilter = $this->filterd;
    }

    public function resetFilters()
    {
        // $this->reset('filterd');
        $this->filterd=$this->initialFilter;
        $this->emit('filterReset');
    }
    public function updatingFilterdDisplayCount($field, $value)
    {
        $this->resetPage();
    }
    public function updatingFilterdOrderBy($field, $value)
    {
        $this->resetPage();
    }
    public function priceRangeUpdated($values)
    {
        $this->filterd['price']['low'] = $values[0];
        $this->filterd['price']['high'] = $values[1];
        $this->resetPage();
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
            SEOTools::setCanonical(env('APP_URL').'/main');
            $this->seoparameter();
            $attributes = $this->category->attributes()->where('is_filter', 1)->has('categoryValues')->with('categoryValues')->get();
            $variation = $this->category->attributes()->where('is_variation', 1)->with('variationValues')->first();
            $products = $this->category->products()->active()->filter($this->filterd)->paginate($this->filterd['displayCount']);
            return view('livewire.home.products-list', compact('attributes', 'variation', 'products'))->extends('home.layout.MasterHome');
        } elseif ($this->routeName == 'home.products.search' && isset($this->category)) {
            SEOTools::setCanonical(env('APP_URL').'/search');
            $this->seoparameter();
            $attributes = $this->category->attributes()->where('is_filter', 1)->has('categoryValues')->with('categoryValues')->get();
            $products = $this->category->productsFromParent()->active()->filter($this->filterd)->paginate($this->filterd['displayCount']);
            return view('livewire.home.products-list', compact('attributes', 'products'))->extends('home.layout.MasterHome');
        } else {
            $this->seoparameter();
            $products = Product::active()->filter($this->filterd)->paginate($this->filterd['displayCount']);
            $categories = Category::where('parent_id', 0)->get();
            return view('livewire.home.products-list', compact('categories', 'products'))->extends('home.layout.MasterHome');
        }
    }
}