<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * App\Models\Transaction
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $order_id
 * @property int $amount
 * @property string|null $ref_id
 * @property string|null $token
 * @property string|null $ip
 * @property string|null $description
 * @property string|null $description_erorr
 * @property string $gateway_name
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction getData($month, $status)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDescriptionErorr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereGatewayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereRefId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUserId($value)
 * @mixin \Eloquent
 */
class Transaction extends Model
{
    use HasFactory;

    protected $table = "transactions";
    protected $guarded = [];

    public function getStatusAttribute($status)
    {
        switch ($status) {
            case '0':
                $status = 'ناموفق';
                break;
            case '1':
                $status = 'موفق';
                break;
        }
        return $status;
    }

    public function scopeGetData($query, $month, $status)
    {
        $v = verta()->startMonth()->subMonth($month - 1);
        $date = verta()->getGregorian($v->year, $v->month, $v->day);
        return $query->where('created_at', '>', Carbon::create($date[0], $date[1], $date[2], 0, 0, 0))
            ->where('status', $status)
            ->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}