<?php

namespace App\Models;

use App\Traits\HandleImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, HandleImageTrait;
    protected $table = 'product';
    protected $fillable = [
        'id',
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

    public function categories()
    {
        return $this->BelongsToMany(category::class);
    }
}
