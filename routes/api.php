<?php

use Illuminate\Http\Request;

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
    Route::post('login', 'Auth\LoginController@login');

    Route::post('logout', 'Auth\LoginController@logout');
    Route::post('/users/store','Api\User\UserController@store');



    Route::group(['middleware'=>'auth:api'],function (){
        //start users routes
        Route::resource('/users','Api\User\UserController')->except(['edit','create']);
        Route::resource('/users.requests','Api\User\UserRequestController')->only(['index']);
        Route::resource('/users.orders','Api\User\UserOrderController')->only(['index']);
        //End users routes


        //start categories routes
        Route::resource('/categories','Api\Category\CategoryController')->only(['index','show']);
        Route::resource('/categories.products','Api\Category\CategoryProductController')->only(['index']);
        //End categories routes

        Route::post('/users/{user}/charge','Api\Charge\ChargeController@store');


        //start orders routes
        Route::resource('/orders','Api\Order\OrderController')->only(['index','show','store']);
        //end  orders routes


        //start home routes
        //end  home routes

    });





});

