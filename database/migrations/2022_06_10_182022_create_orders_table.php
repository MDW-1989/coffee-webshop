<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('user_id')-> unsigned();
            $table->foreignId('user_id');   //foreign key 1
            $table->foreignId('order_items_id');   //foreign key 2

            // $table->bigInteger('order_items_id')-> unsigned();
            // $table->foreign('order_items_id')->references('id')->on('order_items');

            $table->timestamps();
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
};


