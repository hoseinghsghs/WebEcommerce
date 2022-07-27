<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = "comments";
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->orderBy('created_at', 'desc');
    }

    public function appro($appr){

        return $this->hasMany(Comment::class, 'parent_id')->orderBy('created_at', 'desc')->where('approved', $appr);
    }


    public function parent()
    {
         return $this->belongsTo(Comment::class,'parent_id');
    }
    
}