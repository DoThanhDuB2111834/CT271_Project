<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
    {
        return $this->morphMany(item::class, 'Itemable');
    }

    public function getBy($userId)
    {
        // return Cart::whereUserId($userId)->first();

        return $this::where('user_id', $userId)->first();
    }

    public function firstOrCreateBy($userId)
    {
        $cart = $this->getBy($userId);

        if (!$cart) {
            $cart = $this->create(['user_id' => $userId]);
        }
        return $cart;
    }
}
