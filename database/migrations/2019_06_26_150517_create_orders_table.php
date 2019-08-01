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
			$table->string('reference');
			$table->string('current_state');
			$table->string('paid_ht');
			$table->string('paid_ttc');
			$table->string('taxe');
			$table->string('delivery_address');
			$table->integer('idcart')->unsigned()->nullable();
            $table->foreign('idcart')->references('id')->on('cart')->onDelete('cascade');
			$table->integer('id_carrier')->unsigned()->nullable();
            $table->foreign('id_carrier')->references('id')->on('carrier')->onDelete('cascade');
			$table->integer('id_customer')->unsigned()->nullable();
            $table->foreign('id_customer')->references('id')->on('customer')->onDelete('cascade');
			$table->integer('id_payment')->unsigned()->nullable();
            $table->foreign('id_payment')->references('id')->on('payment')->onDelete('cascade');
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


