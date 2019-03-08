<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends User
{


    public  function orders()
    {
        return $this->hasMany('App\Order','driver_id');
    }
}
