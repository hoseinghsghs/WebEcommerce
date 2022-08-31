<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = "questions";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function replies()
    {
        return $this->hasMany(Question::class, 'parent_id')->orderBy('created_at', 'desc');
    }

    public function appro($appr){

        return $this->hasMany(Question::class, 'parent_id')->orderBy('created_at', 'desc')->where('approved', $appr);
    }

    public function parent()
    {
         return $this->belongsTo(Question::class,'parent_id');
    }
}