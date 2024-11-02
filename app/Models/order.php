<?php

namespace App\Models;

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
}
