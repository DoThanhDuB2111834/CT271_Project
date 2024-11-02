<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_status extends Model
{
    use HasFactory;

    protected $table = 'order_status';

    protected $fillable = [
        'status',
        'order_id',
    ];

    public function order()
    {
        return $this->belongsTo(order::class, 'order_id');
    }
}
