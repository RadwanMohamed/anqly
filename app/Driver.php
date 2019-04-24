<?php

namespace App;

use App\Scopes\DriverScope;
use Illuminate\Database\Eloquent\Model;

class Driver extends User
{

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(new DriverScope());
    }
    public  function orders()
    {
        return $this->hasMany('App\Order','driver_id');
    }

}
