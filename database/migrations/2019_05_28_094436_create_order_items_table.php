<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->integer('order_id')->unsigned()->unique();
            $table->integer('product_id')->unsigned()->unique();
            $table->foreign('order_id')
                ->references('id')
                ->on('orders');
            $table->foreign('product_id')
                ->references('id')
                ->on('products');
            $table->integer('quantity');
            $table->float('discount');
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
}
