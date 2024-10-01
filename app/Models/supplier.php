<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'supplier';

    protected $fillable = [
        'name',
        'address',
    ];

    public function goods_receipts()
    {
        return $this->hasMany(goods_receipt::class);
    }
}
