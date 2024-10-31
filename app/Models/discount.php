<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class discount extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $table = 'discount';

    protected $fillable = [
        'description',
        'percentage',
        'startedDate',
        'endedDate',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_discount', 'discount_id', 'product_id');
    }
}
