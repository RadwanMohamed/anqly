<?php

namespace App\Http\Controllers\Vendors;


trait Vendor
{

    function objectsToArray($objects)
    {
        $data = [];
        foreach($objects as $object)
        {
            $data[$object->id] = $object->name;
        }
        return $data;
    }
    
}
