<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as ModelsPermission;

class Permission extends ModelsPermission
{
    use HasFactory;

    protected $fillable = [
        'name',
        'group',
    ];

    public function MyUsers()
    {
        return $this->morphedByMany(User::class, 'model', 'model_has_permissions', 'permission_id', 'model_id');
    }
}
