<?php

namespace App\Models;

use App\Traits\HandleImageTrait;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, HasUlids, SoftDeletes, HandleImageTrait;
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

    function formatedPrice()
    {
        return number_format($this->price, 0, ',', '.') . '₫';
    }

    public function Images()
    {
        return $this->morphMany(Image::class, 'Imageable');
    }

    public function getFirstImageUrl()
    {
        return $this->Images()->first('url');
    }

    public function categories()
    {
        return $this->BelongsToMany(category::class);
    }

    public function goods_recepits()
    {
        return $this->BelongsToMany(goods_receipt::class, 'Goods_receipt_detail', 'product_id', 'Goods_receipt_id');
    }
}
