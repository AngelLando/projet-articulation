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
            $table->string('kind')->nullable();
            $table->string('name')->nullable();
            $table->integer('year')->nullable();
            $table->longText('description')->nullable();
            $table->float('price')->nullable();
            $table->string('path_image')->nullable();
            $table->float('weight')->nullable();
            $table->integer('stock')->nullable();
            $table->float('alcohol')->nullable();
            $table->string('quotation')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
            $table->integer('format_id')->unsigned()->nullable();
            $table->foreign('format_id')
                ->references('id')
                ->on('formats')
                ->onDelete('cascade');
            $table->integer('type_id')->unsigned()->nullable();
            $table->foreign('type_id')
                ->references('id')
                ->on('types')
                ->onDelete('cascade');
            $table->integer('supplier_id')->unsigned()->nullable();
            $table->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onDelete('cascade');
            $table->integer('promotion_id')->unsigned()->nullable();
            $table->foreign('promotion_id')
                ->references('id')
                ->on('promotions');
            //$table->unique(['name', 'year', 'format_id', 'type_id', 'supplier_id'], 'product_unique');
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
