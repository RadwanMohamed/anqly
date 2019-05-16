<?php

Route::get('/adminpanel/logout',"Admin\Auth\LoginController@logout");

Route::get('/login',"Admin\Auth\LoginController@showLoginForm");
Route::get('adminpanel/login',"Admin\Auth\LoginController@showLoginForm");

Route::post('adminpanel/login',"Admin\Auth\LoginController@login");

Route::group(['middleware'=>['admin','web']],function () {

    Route::post('/adminpanel/users/{user}/block', 'Admin\User\UserController@block');
    Route::post('/adminpanel/users/{user}/activate', 'Admin\User\UserController@activate');
    Route::resource('/adminpanel/users', 'Admin\User\UserController');
    Route::resource('/adminpanel/drivers', 'Admin\User\DriverController');
    Route::resource('/adminpanel/clients', 'Admin\User\ClientController');


    Route::resource('/adminpanel/reports', 'Admin\Report\ReportController');



    Route::resource('/adminpanel/categories', 'Admin\Category\CategoryController');



//
    Route::post('/adminpanel/charge/{promotion}/deactivate', 'Admin\Promotion\PromotionController@deactivate');
    Route::post('/adminpanel/charge/{promotion}/activate', 'Admin\Promotion\PromotionController@activate');
    Route::resource('/adminpanel/charge', 'Admin\Promotion\PromotionController');



    Route::resource('/adminpanel/settings', 'Admin\Setting\SettingController');

    Route::get('/', 'HomeController@index');


    Route::get('/home', 'HomeController@index')->name('home');

});

Route::get("/districts",function (){
   $districts = \App\District::where("city_id",3)->get();
   return response()->json($districts,200);
});

Route::get("firebase","FirebaseController@index");
