<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
class ClientController extends Controller
{
    public function index(Request $request)
    {
        $users = Client::select('*');
        foreach (array_except($request->all(),'page') as $key => $value)
        {
            if ($key == '')
                continue;
            if ($key == 'name')
                $users = $users->where($key,'like','%'.$value.'%');
            $users = $users->where($key,'=',$value);
        }
        $users = $users->paginate(50);

        return view('users.index',compact('users'));
    }
}
