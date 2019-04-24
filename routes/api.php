<?php

use Illuminate\Http\Request;
use App\Traits\ApiResponser;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware'=>['api']],function (){


    // Auth
    Route::post('/file',function (Request $request){
        $url = $request->file;
        $data = file_get_contents($url);
        $filename = ''.str_random(8) .'.image.jpg';
        file_put_contents(public_path('images/' . $filename), $data);
        return $filename;

    });

    Route::post('/driver/images',function (Request $request){
        $data = [];
        $user = \App\User::where('api_token',$request->api_token)->first();

        if ($user && $user->role == \App\User::DRIVER) {

            foreach ($request->images as $image)
            {
                $url = $image->url;
                $photo = new \App\Photo();
                $photo->name = $image->name;
                $photo->path = \App\Traits\ApiResponser::uploadImageUsingUrl($url);
                $photo->imageable_id = $user->id;
                $photo->imageable_type = 'App\User';
                $photo->save();
                $data[$image->name] =   $photo->path;
            }
//            if(!$request->has('app')||!$request->has('id')||!$request->has('drive'))
//                return $this->errorResponse("the driver should have three images ('drive','application','id') ",422);
//
////            $user->category_id  = $request->category_id;
//            $application_photo = new \App\Photo();
//            $application_photo->name = 'صورة الاستمارة';
//            $application_photo->path = $request->app->store('');
//            $application_photo->imageable_id = $user->id;
//            $application_photo->imageable_type = 'App\User';
//            $application_photo->save();
//            $data['app'] =   $application_photo->path;
//
//
//            $id_photo = new \App\Photo();
//            $id_photo->name = 'صورة البطاقة';
//            $id_photo->path = $request->id->store('');
//            $id_photo->imageable_id = $user->id;
//            $id_photo->imageable_type = 'App\User';
//            $id_photo->save();
//            $data['id'] = $id_photo->path;
//
//            $driveid = new \App\Photo();
//            $driveid->name = 'صورة رخصة السواقة';
//            $driveid->path = $request->drive->store('');
//            $driveid->imageable_id = $user->id;
//            $driveid->imageable_type = 'App\User';
//            $driveid->save();
//            $data['drive'] = $driveid->path ;
//
//        }
//        else{
//            return response()->json("wrong user data",422);
        }
        return response()->json($data,201);

    });
    Route::post('/login', 'Auth\LoginController@login');

    Route::post('logout', 'Auth\LoginController@logout');
    Route::post('/users/store','Api\User\UserController@store');


    Route::post('/password/email','Api\User\UserController@send');


    Route::post('/message','Api\Contact\ContactController@send');
    // end Email routes

    //start categories routes
    Route::resource('/categories','Api\Category\CategoryController')->only(['index','show']);
//    Route::resource('/categories.products','Api\Category\CategoryProductController')->only(['index']);
    //End categories routes

    Route::group(['middleware'=>'auth:api'],function (){
        //start users routes
        Route::post('/charge','Api\Charge\ChargeController@store');
        Route::get('/users/balance','Api\Charge\ChargeController@balance');

        Route::resource('/users','Api\User\UserController')->except(['edit','create']);
        Route::resource('/users.requests','Api\User\UserRequestController')->only(['index']);
        Route::resource('/users.orders','Api\User\UserOrderController')->only(['index']);
        //End users routes





        //start orders routes
        Route::resource('/orders','Api\Order\OrderController')->only(['index','show','store',"update"]);
        //end  orders routes


        //start home routes
        //end  home routes

        Route::put('/password/reset','Api\User\UserController@updatePassword');

    });




});
Route::get("/districts",function (){
    $districts = \App\District::where("city_id",3)->get();
    return response()->json($districts,200);
});
