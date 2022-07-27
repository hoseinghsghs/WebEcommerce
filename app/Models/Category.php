<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeParents($query)
    {
        return $query->where('parent_id', 0)->get();
    }
    
     public function parent()
     {
         return $this->belongsTo(Category::class,'parent_id');
     }
     public function children()
     {
         return $this->hasMany(Category::class,'parent_id');
     }
     public function attributes()
    {
        return $this->belongsToMany(Attribute::class,'attribute_category');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function productsFromParent()
    {
        return $this->hasManyThrough(Product::class,Category::class,'parent_id','category_id','id','id');
    }

}