<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    use HasFactory;
    protected $table = "event_users";
    protected $guarded = [];

    public function events()
    {
        return $this->hasMany(Event::class , 'user_id');
    }
}