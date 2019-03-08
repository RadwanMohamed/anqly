<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends User
{

    public  function orders()
    {
        return $this->hasMany('App\Order','client_id');
    }
}
