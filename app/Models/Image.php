<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    use HasFactory;
    protected $table = 'image';

    protected $fillable = [
        'url',
    ];

    public function Imageable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getName()
    {
        return substr($this->url, strrpos($this->url, '/') + 1);
    }
}
