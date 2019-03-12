<?php

namespace App\Http\Controllers\Admin\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
class ClientController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('role',User::CLIENT)->get();

        return view('users.index',compact('users'));
    }
}
