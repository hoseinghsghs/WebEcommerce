<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $user_id
 * @property int $address_id
 * @property int|null $coupon_id
 * @property int $status
 * @property int $total_amount
 * @property int $delivery_amount
 * @property int $coupon_amount
 * @property int $paying_amount
 * @property string $payment_type
 * @property int $payment_status
 * @property string|null $description
 * @property string|null $description_error
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\UserAddress|null $address
 * @property-read \App\Models\Coupon|null $coupon
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Event[] $events
 * @property-read int|null $events_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderItem[] $orderItems
 * @property-read int|null $order_items_count
 * @property-read \App\Models\Transaction|null $transaction
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCouponAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeliveryAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDescriptionError($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePayingAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $guarded = [];


    public function getStatusAttribute($status)
    {
        switch($status){
            case '0' :
                $status = 'پرداخت نشده';
                break;
            case '1' :
                $status = 'آماده برای ارسال';
                break;
            case '2' :
                $status = 'محصول ارسال شد';
                break;
            case '3' :
                $status = 'مرجوعی';
                break;    
        }
        return $status;
    }
    public function getPaymentTypeAttribute($paymentType)
    {
        switch($paymentType){
            case 'pos' :
                $paymentType = 'دستگاه pos';
                break;
            case 'online' :
                $paymentType = 'اینترنتی';
                break;
        }
        return $paymentType;
    }

    public function getPaymentStatusAttribute($paymentStatus)
    {
        switch($paymentStatus){
            case '0' :
                $paymentStatus = 'ناموفق';
                break;
            case '1' :
                $paymentStatus = 'موفق';
                break;
        }
        return $paymentStatus;
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function address()
    {
        return $this->belongsTo(UserAddress::class);
    }
    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    } 
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}