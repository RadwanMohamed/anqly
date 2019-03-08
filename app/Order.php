<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const  NEW = 'new';
    const  BOOKED = 'booked';
    const  EXPIRED = 'expired';
    protected $fillable = ['name', 'from', 'to', 'datetime', 'desc', 'value','client_id','category_id'];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
