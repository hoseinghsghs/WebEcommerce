<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Attribute
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductAttribute[] $categoryValues
 * @property-read int|null $category_values_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductVariation[] $variationValues
 * @property-read int|null $variation_values_count
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Attribute extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function categories()
    {
        return $this->belongsToMany(Category::class,'attribute_category');
    }
    public function categoryValues()
    {
        return $this->hasMany(ProductAttribute::class)->select('value','attribute_id')->distinct();
    }
    public function variationValues()
    {
        return $this->hasMany(ProductVariation::class)->select('value','attribute_id')->distinct();
    }
}
