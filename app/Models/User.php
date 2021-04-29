<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar'
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

    /**
     * @return BelongsToMany
     */
    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @return BelongsToMany
     */
    public function permission()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasAbility($permissions)
    {
        $user = Auth::user();
        $role = $user->role->first();
        $rolePermissions = $role->permission;
        $userPermissions = $user->permission;

        if(!$role)
            return false;

        foreach ($userPermissions as $permission)
        {
            if(is_array($permission->slug) && in_array($permission->slug,$permissions))
            {
                return true;
            }
            elseif(is_string($permissions) && strcmp($permissions,$permission->slug) == 0)
            {
                return true;
            }
        }
        return false;
    }

}
