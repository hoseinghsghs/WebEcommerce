<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
