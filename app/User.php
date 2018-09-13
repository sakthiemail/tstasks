<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function roles()
    {
      return $this->belongsToMany('App\Role');
    }

    public function hasAnyRole($roles)
    {
      return null !== $this->roles()->whereIn('name',$roles)->first();
    }

    public function hasRole($roles)
    {
      return null !== $this->roles()->where('name',$roles)->first();
    }

    public function authorize($roles)
    {
      if(is_array($roles))
      {
        return $this->hasAnyRoles($roles) || abort('401','Unautorized Access');
      }
      return $this->hasRole($roles) || abort('401','Unautorized Access');
    }
    public function posts()
    {
      return $this->hasMany('App\Post');
    }
}
