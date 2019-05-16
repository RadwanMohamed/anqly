<?php

namespace App\Providers;

use App\Order;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Kreait\Firbase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\ServiseAccount;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Order::created(function ($order){
            $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/ankelny-firebase-adminsdk-m4old-c600d19e4c.json');
            $firebase = (new Factory) -> withServiceAccount($serviceAccount)->withDatabaseUri("https://ankelny.firebaseio.com")->create();
            $database = $firebase->getDatabase();
            $newPost  = $database->getReference('orders')->push(['id'=>$order->id,"name"=>$order->name,"client_id"=>$order->client_id]);
            print_r($newPost->getValue());
        });
    }
}
