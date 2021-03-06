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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            // $table->integer('order_id');
            // $table->integer('product_id');
            $table->foreignId('order_id')->references('id')->on('orders'); 

            $table->foreignId('product_id')->references('id')->on('products');
            $table->integer('amount');
            $table->decimal('total_price');
            $table->string('sweetener');
            $table->string('topping');
            $table->string('flavour');
            $table->string('milk');
            $table->string('size');
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
        Schema::dropIfExists('order_items');
    }
};