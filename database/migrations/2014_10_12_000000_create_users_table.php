<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
//            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('city');
            $table->string('role');
            $table->string('status');
            $table->integer('balance')->default(0);
            $table->integer('category_id')->unsigned()->nullable();
            $table->string('api_token')->nullable();
//            $table->rememberToken();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
