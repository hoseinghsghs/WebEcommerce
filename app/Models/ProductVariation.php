<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ProductVariation
 *
 * @property int $id
 * @property int $attribute_id
 * @property int $product_id
 * @property string $value
 * @property int $price
 * @property int $quantity
 * @property string|null $sku
 * @property string|null $guarantee
 * @property string|null $time_guarantee
 * @property int|null $sale_price
 * @property string|null $date_on_sale_from
 * @property string|null $date_on_sale_to
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Attribute|null $attribute
 * @property-read mixed $is_sale
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation newQuery()
 * @method static \Illuminate\Database\Query\Builder|ProductVariation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereDateOnSaleFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereDateOnSaleTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereGuarantee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereSalePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereTimeGuarantee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|ProductVariation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ProductVariation withoutTrashed()
 * @mixin \Eloquent
 */
class ProductVariation extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded=[];
    protected $table="product_variations";

    public function attribute(){
        return $this->belongsTo(Attribute::class);
    }


    public function getIsSaleAttribute()
    {
        return ($this->sale_price != null && $this->date_on_sale_from < Carbon::now() && $this->date_on_sale_to > Carbon::now()) ? true : false;
    }
}