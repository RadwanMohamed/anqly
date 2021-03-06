<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['name', 'path', 'imageable_id', 'imageable_type'];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function getPathAttribute($value)
    {
        return "images/{$value}";
    }
}
