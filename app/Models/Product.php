<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;
    
    protected $guarded=[];
    protected $table="products";
    protected $appends = ['quantity_check', 'sale_check', 'price_check' , 'pro_check'];
    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

  public function getProCheckAttribute()
    {
        return $this->category()->where('name', 'موبایل')->first() ?? false;
    }
    
    public function getPriceCheckAttribute()
    {
        return $this->variations()->where('quantity', '>', 0)->orderBy('price')->first() ?? false;
    }

    public function getSaleCheckAttribute()
    {
        return $this->variations()->where('quantity', '>', 0)->where('sale_price', '!=', null)->where('date_on_sale_from', '<', Carbon::now())->where('date_on_sale_to', '>', Carbon::now())->orderBy('sale_price')->first() ?? false;
    }

    public function getQuantityCheckAttribute()
    {
        return $this->variations()->where('quantity', '>', 0)->first() ?? 0;
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }

    public function brand()
    {

        return $this->belongsTo(Brand::class);
    }

    public function category()
    {

        return $this->belongsTo(Category::class);
    }

    public function attributes()
    {

        return $this->hasMany(ProductAttribute::class);
    }

    public function variations()
    {

        return $this->hasMany(ProductVariation::class);
    }

    public function images()
    {

        return $this->hasMany(ProductImage::class);
    }

    public function rates()
    {

        return $this->hasMany(ProductRate::class);
    }
    
    public function approvedComments()
    {
        return $this->morphMany(Comment::class, 'commentable')->where('approved' , 1)->where('parent_id' , 0);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    public function checkUserWishlist($userId)
    {
        return $this->hasMany(WishList::class)->where('user_id' , $userId)->exists();
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['search'])) {
            $query->where('products.name', 'like', '%' . $filters['search'] . '%');
        }

        if (isset($filters['brand'])) {
            $query->where('brand_id', $filters['brand']);
        }

        if (isset($filters['category'])) {
            $query->where('category_id', $filters['category']);
        }

        if ($filters['price']['low'] && $filters['price']['high']) {
            $query->whereHas('variations', function ($q) use ($filters) {
                $q->whereBetween('price', [str_replace(',', '',$filters['price']['low']), str_replace(',', '',$filters['price']['high'])]);
            });
        }

        if (!empty($filters['attribute'])) {
            foreach ($filters['attribute'] as $attribute_id => $values) {
                $query->whereHas('attributes', function ($q) use ($attribute_id, $values) {
                    $q->where('attribute_id', $attribute_id);
                    $q->whereIn('value', $values);
                });
            }
        }

        if (!empty($filters['variation'])) {
            foreach ($filters['variation'] as $variation_id => $values) {
                $query->whereHas('variations', function ($q) use ($variation_id, $values) {
                    $q->where('attribute_id', $variation_id);
                    $q->whereIn('value', $values);
                });
            }
        }

        if (isset($filters['orderBy']) && $filters['orderBy'] != 'default') {
            switch ($filters['orderBy']) {
                case 'date-old':
                    $query->oldest();
                    break;
                case 'date-new':
                    $query->latest();
                    break;
                case 'price-high':
                    $query->orderByDesc(
                        ProductVariation::select('price')->whereColumn('product_variations.product_id', 'products.id')->orderBy('sale_price', 'desc')->take(1)
                    );
                    break;
                case 'price-low':
                    $query->orderBy(
                        ProductVariation::select('price')->whereColumn('product_variations.product_id', 'products.id')->orderBy('sale_price', 'desc')->take(1)
                    );
                    break;
                default:
                    $query;
            }
        }
    }
}