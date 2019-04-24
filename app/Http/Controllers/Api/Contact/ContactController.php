<?php

namespace App\Http\Controllers\Api\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        $rules = [
            'name'    => 'required|string',
            'phone'   => 'required|numeric',
            'subject' => 'required|string',
            'message' => 'required|string',
        ];
        $this->validate($request, $rules);
        $message = " هذه الرسالة مرسلة اليك من {$request->email}
        {$request->phone} برقم جوال 
        :
        $request->message
         ";

        Mail::raw($message,function ($message)use ($request){
            $message->to('6544743@gmail.com')->subject($request->subject);
        });
        return response()->json(["response"=>'تم ارسال الرسالة'],200);

    }


}
