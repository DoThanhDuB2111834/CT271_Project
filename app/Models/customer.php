<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = ['name', 'phone_number', 'user_id'];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
