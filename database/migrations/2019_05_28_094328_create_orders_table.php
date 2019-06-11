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
            $table->string('delivery_method')->nullable();
            $table->float('tva')->nullable();
            $table->float('discount')->nullable();
            $table->string('payment_method')->nullable();
            $table->integer('gift')->nullable();
            $table->string('comment')->nullable();
            $table->string('shipping_status')->nullable();
            $table->string('payment_status')->nullable();
            $table->integer('cgv');
            $table->timestamps();
            $table->integer('address_id_1')->unsigned();
            $table->foreign('address_id_1')
                ->references('id')
                ->on('addresses');
            $table->integer('address_id_2')->unsigned();
            $table->foreign('address_id_2')
                ->references('id')
                ->on('addresses');
            $table->integer('address_id_3')->unsigned();
            $table->foreign('address_id_3')
                ->references('id')
                ->on('addresses');
            $table->integer('shipping_cost_id')->unsigned();
            $table->foreign('shipping_cost_id')
                ->references('id')
                ->on('shipping_costs');
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
