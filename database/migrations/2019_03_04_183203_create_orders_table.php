<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('from');
            $table->string('to');
            $table->timestamp('datetime');
            $table->text('desc');
            $table->string('value');
            $table->string('status')->default(\App\Order::NEW);
            $table->integer('client_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('driver_id')->unsigned();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('users');
            $table->foreign('driver_id')->references('id')->on('users');
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
        Schema::dropIfExists('orders');
    }
}
