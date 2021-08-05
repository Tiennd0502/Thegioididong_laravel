<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    protected $status = [ 
        1 => [
            'name' =>'Kích hoạt',
            'class' => 'badge bg-success'
        ],
        0 => [
            'name' =>'Hủy kích hoạt',
            'class' => 'badge bg-danger'
        ]
    ];

    public function getStatus(){
        return Arr::get($this->status,$this->active,'[N\A]');
    }
    public function roles(){
        return $this->belongsToMany(Role::class,'role_users');
    }

    public function checkPermissionAccess($keyCode){
        $roles = Auth::user()->roles;
        foreach ($roles as $key => $role) {
            $permissions = $role->permissions;
            if($permissions->contains('key_code', $keyCode)){
                return true;
            };
        }
        return false;
    }
}
