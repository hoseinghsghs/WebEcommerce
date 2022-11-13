<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property string|null $position
 * @property string|null $lable
 * @property int|null $brand_id
 * @property int $category_id
 * @property string $slug
 * @property string $primary_image
 * @property string $description
 * @property int $status
 * @property int $is_active
 * @property int $is_archive
 * @property int $delivery_amount
 * @property int|null $delivery_amount_per_product
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $approvedComments
 * @property-read int|null $approved_comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] $approvedQuestions
 * @property-read int|null $approved_questions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductAttribute[] $attributes
 * @property-read int|null $attributes_count
 * @property-read \App\Models\Brand|null $brand
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read mixed $price_check
 * @property-read mixed $pro_check
 * @property-read mixed $quantity_check
 * @property-read mixed $sale_check
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductImage[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] $question
 * @property-read int|null $question_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductRate[] $rates
 * @property-read int|null $rates_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductVariation[] $variations
 * @property-read int|null $variations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product active()
 * @method static \Database\Factories\ProductFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Product filter($filters)
 * @method static \Illuminate\Database\Eloquent\Builder|Product findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeliveryAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeliveryAmountPerProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsArchive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereLable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrimaryImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];
    protected $table = "products";
    protected $appends = ['quantity_check', 'sale_check', 'price_check', 'pro_check'];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('products.is_active', true);
    }

    /**
     * Get the percentage of discount price.
     *
     */
    protected function scopeDiscountPercent()
    {
        $prices = $this->variations()->where([['quantity', '>', 0], ['sale_price', '<>', null], ['date_on_sale_from', '<', Carbon::now()], ['date_on_sale_to', '>', Carbon::now()]])->get(['sale_price', 'price'])->toArray();
        if ($prices) {
            foreach ($prices as $price) {
                $percents[] = intval(100 - (($price['sale_price'] * 100) / $price['price']));
            }
            $percents = array_unique($percents);
            sort($percents);
            return $percents;
        }
        return null;
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
        // dd($this->variations()->where('quantity', '>', 0)->where('sale_price', '!=', null)->where('date_on_sale_from', '<', Carbon::now())->first());
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
        return $this->morphMany(Comment::class, 'commentable')->where('approved', 1)->where('parent_id', 0);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    public function approvedQuestions()
    {
        return $this->hasMany(Question::class)->where('approved' , 1)->where('parent_id' , 0);
    }

    public function question()
    {
        return $this->hasMany(Question::class)->whereNull('parent_id');
    }

    public function checkUserWishlist($userId)
    {
        return $this->hasMany(WishList::class)->where('user_id', $userId)->exists();
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['search'])) {
            $query->where('products.name', 'like', '%' . $filters['search'] . '%');
        }

        if (isset($filters['tag'])) {
            $query->whereHas('tags',function($q)use($filters){
                $q->where('name', $filters['tag']);
            });
        }
        
        if (isset($filters['position'])) {
            $query->where('position',$filters['position']);
        }

        if (isset($filters['brand'])) {
            $query->where('brand_id', $filters['brand']);
        }

        if (isset($filters['category'])) {
            $query->where('category_id', $filters['category']);
        }

        if ($filters['price']['low'] < $filters['price']['high']) {
            $query->whereHas('variations', function ($q) use ($filters) {
                $q->whereBetween('price', [str_replace(',', '', $filters['price']['low']), str_replace(',', '', $filters['price']['high'])]);
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
