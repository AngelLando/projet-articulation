<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppellationProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appellation_product', function (Blueprint $table) {
            $table->integer('appellation_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->foreign('appellation_id')->references('id')->on('appellations');
            $table->foreign('product_id')->references('id')->on('products');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appellation_product');
    }
}
