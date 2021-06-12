<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                  ->onUpdate('cascade')->onDelete('set null');
            $table->string('invoice_no')->unique();
            $table->string('billing_email');
            $table->string('billing_name');
            $table->string('billing_address');
            $table->string('billing_phone');
            $table->integer('billing_subtotal');
            $table->integer('billing_vat')->default(0);
            $table->integer('billing_total');
            $table->string('payment_getway');
            

            $table->string('feedback');
            $table->boolean('completed')->default(false);

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
}
