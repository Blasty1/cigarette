<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','surname','Nazione','Provincia','Città','id_industry','last_activity','id_role'
    ];
  
    public function sells()
    {
        return $this->hasMany('App\Sell', 'id', 'id_user');
    }

    public function industries()
    {
        return $this->hasMany('App\Industry', 'id_industry', 'id');
    }

    public function roles()
    {
        return $this->hasOne('App\Role', 'id_role', 'id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
