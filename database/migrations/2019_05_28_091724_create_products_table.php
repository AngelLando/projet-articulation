<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kind');
            $table->string('name');
            $table->integer('year');
            $table->longText('description');
            $table->string('path_image');
            $table->float('weight');
            $table->integer('stock');
            $table->float('alcohol');
            $table->string('quotation');
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
            $table->integer('format_id')->unsigned();
            $table->foreign('format_id')
                ->references('id')
                ->on('formats');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')
                ->references('id')
                ->on('types');
            $table->integer('supplier_id')->unsigned();
            $table->foreign('supplier_id')
                ->references('id')
                ->on('suppliers');
            $table->integer('price_id')->unsigned();
            $table->foreign('price_id')
                ->references('id')
                ->on('prices');
            $table->unique(['name', 'year', 'format_id', 'type_id', 'supplier_id'], 'product_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
