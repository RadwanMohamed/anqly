<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','desc'];
    public function images()
    {
        return $this->morphMany('App\Photo', 'imageable');
    }
}
//mvqhW9VHvkPaTsBCVWrPfaCKNVKxDG6VgPbNpZFN
