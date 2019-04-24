<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\ApiController;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return $this->showAll('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:190',
            'email' => 'required|email',
            'phone' => 'required|string|unique:users',
            'password' => 'required|string|confirmed',
            'role' => 'required|string|in:' . User::CLIENT . ',' . User::DRIVER,
            'class' => 'nullable|string',
            'city' => 'required|string',

        ];
        $this->validate($request, $rules);

//        dd($request->all());
        $user = new User();
        $user->name   =  $request->name ;
        $user->email   =  $request->email ;
        $user->phone   =  $request->phone ;
        $user->password   =  bcrypt($request->password) ;
        $user->role   =  $request->role ;
        $user->balance   =  0 ;
        $user->status   =  User::ON ;
        $user->api_token   =  User::generateToken() ;
        $user->city   = $request->city;
        $user->save();

        if ($request->role == User::DRIVER) {
//
//            if(!$request->has('app')||!$request->has('id')||!$request->has('drive'))
//                    return $this->errorResponse("the driver should have three images ('drive','application','id') ",422);
            $user->category_id  = $request->category_id;
//            $application_photo = new Photo();
//            $application_photo->name = 'صورة الاستمارة';
//            $application_photo->path = $request->app->store('');
//            $application_photo->imageable_id = $user->id;
//            $application_photo->imageable_type = 'App\User';
//            $application_photo->save();
//
//
//            $id_photo = new Photo();
//            $id_photo->name = 'صورة البطاقة';
//            $id_photo->path = $request->id->store('');
//            $id_photo->imageable_id = $user->id;
//            $id_photo->imageable_type = 'App\User';
//            $id_photo->save();
//
//
//            $driveid = new Photo();
//            $driveid->name = 'صورة رخصة السواقة';
//            $driveid->path = $request->drive->store('');
//            $driveid->imageable_id = $user->id;
//            $driveid->imageable_type = 'App\User';
//            $driveid->save();
//
        }

        return $this->showOne('user', $user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $this->showOne('user', $user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($user->api_token != $request->api_token)
            return $this->errorResponse('عفوا غير مصرح لك باجراء هذه العملية',422);

        $rules = [
            'name' => 'nullable|string|max:190',
            'email' => 'nullable|email',
            'city' => 'nullable|string'
        ];
        $this->validate($request, $rules);

        if ($request->has('name'))
            $user->name = $request->name;

        if ($request->has('email'))
            $user->email = $request->email;


        if ($request->has('city'))
            $user->city = $request->city;
        if ($user->role == User::DRIVER)
        {
            if ($request->has("app"))
            {
                $photo = Photo::where([['name','صورة الاستمارة'],['imageable_id',$user->id]])->first();
                $photo->path = $request->app->store('');
                $photo->save();
            }
            if ($request->has("id"))
            {
                $photo = Photo::where([['name','صورة البطاقة'],['imageable_id',$user->id]])->first();
                $photo->path = $request->id->store('');
                $photo->save();
            }

            if ($request->has("drive"))
            {
                $photo = Photo::where([['name','صورة رخصة السواقة'],['imageable_id',$user->id]])->first();
                $photo->path = $request->drive->store('');
                $photo->save();
            }
        }
        if ($user->isClean())
            return $this->errorResponse('you should enter new data.', 422);
        $user->save();

        return $this->showOne('user', $user, 200);


    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,User $user)
    {

        if ($user->api_token != $request->api_token)
            return $this->errorResponse('عفوا غير مصرح لك باجراء هذه العملية',422);

        if ($user->has('images'))
        {
            $this->deleteFiles($user->images);
            Photo::where([['imageable_id',$user->id],['imageable_type','App\User']])->delete();
        }
        $user->delete();
        return $this->showOne('user',$user, 200);
    }

    public function send(Request $request)
    {
        if ($request->has('locale'))
        {
            $locale = $request->locale;
            App::setLocale($locale);
        }

        $user = User::where('email',$request->email)->first();
        if (!$user)
            return $this->errorResponse('please enter valid data',422);

        $verification = User::generateVerificationKey();

        $user->password = bcrypt($verification);

        $user->save();

        $message = "
                تم ارسال هذا البريد بناءا على طلبك لتحديث كلمة السر. كلمة السر الجديدة الخاصة بك :
  {$verification}              
";
        Mail::raw($message,function ($message)use ($request,$user){
           $message->to($user->email)->subject($request->subject);
        });
        return response()->json(["message"=>"تم ارسال رسالة لايميل الخاص بك"],200);

    }

    public function updatePassword(Request $request)
    {
        $user = User::where('api_token',$request->api_token)->first();
        $rules = [
            'oldpassword'   => 'required|string',
            'password'      => 'required|string|confirmed',
        ];
        $this->validate($request, $rules);

        if(!Hash::check($request->oldpassword,$user->password))
            return $this->errorResponse(["message"=>"كلمة السر غير صحيحة"],422);

        $user->password = bcrypt($request->password);
        $user->verify = null;
        $user->save();
        return $this->showOne('user',$user);
    }

}
