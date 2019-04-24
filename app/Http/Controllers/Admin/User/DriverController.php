<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Driver;
use App\User;
class DriverController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('role',User::DRIVER)->get();
        return view('users.index',compact('users'));
    }
}
