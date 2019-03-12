<?php

namespace App\Http\Controllers\Api\User;

use App\Driver;
use App\Http\Controllers\ApiController;
use App\User;

class UserOrderController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(User $user)
    {
        $orders = $user->orders;
        return $this->showAll('orders',$orders);
    }


}
