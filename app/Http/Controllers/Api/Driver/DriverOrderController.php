<?php

namespace App\Http\Controllers\Api\Driver;

use App\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class DriverOrderController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Driver $driver)
    {
        $orders = $driver->orders;
        return $this->showAll($orders);
    }


    public function destroy($id)
    {
        //
    }
}
