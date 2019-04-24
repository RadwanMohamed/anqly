<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class,500)->create();
        factory(App\Charge::class,100)->create();
        factory(App\User::class,1000)->create();

//        $this->call(UsersTableSeeder::class);
    }
}
