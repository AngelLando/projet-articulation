<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')
                ->references('id')
                ->on('products');
            $table->integer('cart_id')->unsigned()->nullable();
            $table->foreign('cart_id')
                ->references('id')
                ->on('carts');
            $table->integer('quantity')->nullable();
            $table->unique(['product_id', 'cart_id']);
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}
