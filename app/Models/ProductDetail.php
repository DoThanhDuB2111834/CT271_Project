<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'size',
        'color',
        'quantity',
        'price',
    ];

    public function Product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function Images()
    {
        return $this->morphMany(Image::class, 'Imageable');
    }
}
