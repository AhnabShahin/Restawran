<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trackings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('order_lists')->onUpdate('cascade')->onDelete('cascade');

            $table->boolean('confirmed')->default(true);
            $table->boolean('processing')->default(false);
            $table->boolean('prepared')->default(false);
            $table->boolean('shipping')->default(false);
            $table->boolean('received')->default(false);

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
        Schema::dropIfExists('traking');
    }
}
