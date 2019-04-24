<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    const ON     = '1';
    const OFF    = '0';

    CONST DRIVER = 'driver';
    CONST CLIENT = 'client';
    CONST ADMIN  = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',' phone','password','city','role','category_id','status','api_token','balance'
    ];

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

    public static function generateToken()
    {
        return str_random(40);
    }
    public static function generateVerificationKey()
    {
        return str_random(6);
    }
    public function images()
    {
        return $this->morphMany('App\Photo', 'imageable');
    }
    public  function orders()
    {
        return $this->hasMany('App\Order','driver_id');
    }
}
