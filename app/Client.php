<?php

namespace App;

use App\Scopes\ClientScope;
use Illuminate\Database\Eloquent\Model;

class Client extends User
{
    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ClientScope());
    }

    public  function orders()
    {
        return $this->hasMany('App\Order','client_id');
    }
}
