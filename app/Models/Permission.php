<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Role;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $guarded = [];

    
    public function roles()
    {
        return $this->belongsToMany(Role::class,'permission_roles');
    }

    public function permissionsChildren()
    {
        return $this->hasMany(Permission::class,'parent_id', 'id');
    }

}
