<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EventUser
 *
 * @property int $id
 * @property int $event_id
 * @property int $user_id
 * @property int $has_seen
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Event[] $events
 * @property-read int|null $events_count
 * @method static \Illuminate\Database\Eloquent\Builder|EventUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventUser whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventUser whereHasSeen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventUser whereUserId($value)
 * @mixin \Eloquent
 */
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