<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'group',
        'guard_name'
    ];

    public function MyUsers()
    {
        return $this->morphedByMany(User::class, 'model', 'model_has_roles', 'role_id', 'model_id');
    }

}
