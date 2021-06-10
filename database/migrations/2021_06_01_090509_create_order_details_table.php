<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned()->nullable();
            $table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('set null');

            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('order_lists')->onUpdate('cascade')->onDelete('cascade');


            $table->string('item_name');
            $table->string('item_image_path');
            $table->integer('item_price');
            $table->unsignedInteger('item_quantity');
            $table->integer('total_price');
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
        Schema::dropIfExists('order_details');
    }
}
