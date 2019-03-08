<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{

    protected $fillable = ['name', 'code', 'count', 'status', 'value'];
    const EXPIRED = 'expired';
    const ACTIVATED = 'activated';
    const FIXED = 'fixed';
    const DYNAMIC = 'dynamic';

    public static function generateChargeCode()
    {
        return str_random(10);
    }
}
