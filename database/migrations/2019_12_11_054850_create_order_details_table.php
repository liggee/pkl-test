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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_order');
            $table->unsignedBigInteger('id_product');
            $table->integer('quantity');
            $table->unsignedBigInteger('id_status');
            $table->timestamps();

            $table->foreign('id_order')->references('id')->on('orders')->ondelete('restrict');
            $table->foreign('id_product')->references('id')->on('products')->ondelete('restrict');
            $table->foreign('id_status')->references('id')->on('status_orders')->ondelete('restrict');

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
