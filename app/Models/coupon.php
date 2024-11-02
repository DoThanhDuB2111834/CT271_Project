<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class coupon extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $table = 'coupon';

    protected $fillable = [
        'value',
        'startedDate',
        'endedDate',
    ];

    public function orders()
    {
        return $this->belongsToMany(order::class, 'coupon_order');
    }
}
