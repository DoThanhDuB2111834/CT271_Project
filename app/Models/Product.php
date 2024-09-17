<?php

namespace App\Models;

use App\Traits\HandleImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, HandleImageTrait;
    protected $table = 'product';
    protected $fillable = [
        'name',
        'description',
        'size',
        'color',
        'quantity',
        'price',
    ];

    public function Images()
    {
        return $this->morphMany(Image::class, 'Imageable');
    }
}
