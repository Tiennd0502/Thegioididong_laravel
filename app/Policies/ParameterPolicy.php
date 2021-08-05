<?php

namespace App\Policies;

use App\Models\Parameter;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParameterPolicy
{
    use HandlesAuthorization;
    public $name = 'parameter';

    public function viewAny(User $user)
    {
        //
    } 

    public function view(User $user)
    {
        return $user->checkPermissionAccess(\config('permissions.access.list-'.$this->name));
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess(\config('permissions.access.add-'.$this->name));
    }

    public function show(User $user)
    {
        return $user->checkPermissionAccess(\config('permissions.access.show-'.$this->name));
    }

    public function copy(User $user)
    {
        return $user->checkPermissionAccess(\config('permissions.access.copy-'.$this->name));
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess(\config('permissions.access.edit-'.$this->name));
    }
    
    public function delete(User $user)
    {
        return $user->checkPermissionAccess(\config('permissions.access.delete-'.$this->name));
    }
    public function restore(User $user, Parameter $parameter)
    {
        //
    }

    public function forceDelete(User $user, Parameter $parameter)
    {
        //
    }
}
