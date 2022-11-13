<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductRate
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property int|null $rate
 * @property int $cost
 * @property int $quality
 * @property int $satisfaction
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRate query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRate whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRate whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRate whereQuality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRate whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRate whereSatisfaction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRate whereUserId($value)
 * @mixin \Eloquent
 */
class ProductRate extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table="product_rates";
}