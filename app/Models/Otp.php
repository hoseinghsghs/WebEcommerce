<?php

namespace App\Models;

use App\Notifications\OtpSms;
use App\Traits\Uuid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;

/**
 * App\Models\Otp
 *
 * @property string $id
 * @property string $code
 * @property string $cellphone
 * @property int|null $user_id
 * @property int $used
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Otp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Otp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Otp query()
 * @method static \Illuminate\Database\Eloquent\Builder|Otp whereCellphone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Otp whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Otp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Otp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Otp whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Otp whereUsed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Otp whereUserId($value)
 * @mixin \Eloquent
 */
class Otp extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $guarded = [];
    protected $fillable = [
        'id',
        'code',
        'cellphone',
        'user_id',
        'used'
    ];

    public function __construct(array $attributes = [])
    {
        if (!isset($attributes['code'])) {
            $attributes['code'] = $this->generateCode();
        }
        parent::__construct($attributes);
    }
    /**
     * Generate a six digits code
     *
     * @param int $codeLength
     * @return string
     */
    public function generateCode($codeLength = 5)
    {
        $max = pow(10, $codeLength);
        $min = $max / 10 - 1;
        $code = mt_rand($min, $max);
        return $code;
    }
    /**
     * User tokens relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * True if the token is not used nor expired
     *
     * @return bool
     */
    public function isValid()
    {
        return !$this->isUsed() && !$this->isExpired();
    }
    /**
     * Is the current token used
     *
     * @return bool
     */
    public function isUsed()
    {
        return $this->used;
    }
    /**
     * Is the current token expired
     *
     * @return bool
     */
    public function isExpired()
    {
        return $this->updated_at->diffInSeconds(Carbon::now()) > env('OTP_TIME', 2) * 60;
    }
    public function sendCode($resend = false)
    {
        if (!$this->code || $resend) {
            $this->code = $this->generateCode();
            $this->save();
        }
        try {
            if ($this->user) {
                $this->user->notify(new OtpSms(['code'=>$this->code]));
            } else {
                Notification::route('cellphone', $this->cellphone)->notify(new OtpSms(['code'=>$this->code]));
            }
        } catch (\Exception $ex) {
            return false; //enable to send SMS
        }
        return true;
    }
}
