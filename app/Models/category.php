<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

use function PHPUnit\Framework\isEmpty;

class category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'category';

    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function parent(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'has_children_category', 'child_id', 'parent_id', );
    }

    public function children(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'has_children_category', 'parent_id', 'child_id', );
    }

    public function isParentOf($category)
    {
        return $this->children()->where(['child_id' => $category->id])->exists();
    }

    public function isChildOf($category)
    {
        return $this->parent()->where(['parent_id' => $category->id])->exists();
    }

    public function getHighestParent()
    {
        $category = $this->all();
        $parentCategories = $category->filter(function ($category, $index) {
            return $category->children()->count() > 0;
        });

        $result = $parentCategories->filter(function ($category, $index) {
            return $category->parent()->count() == 0;
        });
        return $result;
    }
}
