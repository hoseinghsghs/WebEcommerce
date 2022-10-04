<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, Sluggable , SoftDeletes;

    protected $fillable = ['user_id', 'title', 'slug', 'body', 'status' , 'category'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
    public function approvedComments()
    {
        return $this->morphMany(comment::class, 'commentable')->where('approved', 1)->where('parent_id', 0);
    }
    
}