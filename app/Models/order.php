<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class order extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $table = 'order';

    protected $fillable = [
        'username',
        'address',
        'description',
        'phone_number',
        'email',
        'total_price',
        'user_id',
    ];

    public function items()
    {
        return $this->morphMany(item::class, 'Itemable');
    }

    public function coupons()
    {
        return $this->belongsToMany(coupon::class, 'coupon_order');
    }

    public function order_status()
    {
        return $this->hasMany(order_status::class, 'order_id');
    }

    public function getCurrentStatus()
    {
        $order_status = $this->order_status()->latest()->first();

        return $order_status->status;
    }

    public function getTotalPriceAfterCoupon()
    {
        $decreasePrice = 0.0;
        foreach ($this->coupons as $coupon) {
            $decreasePrice += $coupon->value / 100 * $this->total_price;
        }

        return $this->total_price - $decreasePrice;
    }

    static public function getTotalPriceInThisWeek()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $ordersThisWeek = Order::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();

        $total_price = 0.0;

        foreach ($ordersThisWeek as $order) {
            if ($order->order_status()->latest()->first()->status == 'Đã hoàn thành') {
                $total_price += $order->total_price;
            }
        }

        return $total_price;

    }
}
