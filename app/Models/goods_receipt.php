<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class goods_receipt extends Model
{
    use HasFactory, HasUlids, SoftDeletes;
    protected $table = 'goods_receipt';

    protected $fillable = [
        'total_price',
        'description',
        'reason',
        'supplier_id'
    ];

    public function supplier()
    {
        return $this->belongsTo(supplier::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'Goods_receipt_detail', 'Goods_receipt_id', 'product_id')->withPivot('quantity', 'price')->withTimestamps();
    }
}
