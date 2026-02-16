<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        return $this->belongsToMany('App\Role', 'users_roles');
    }

    public function places()
    {
        return $this->belongsToMany('App\Place', 'users_places');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'users_permissions');
    }
    public function centers()
    {
        return $this->belongsToMany('App\StudyzoneCenter', 'users_centers');
    }
}
