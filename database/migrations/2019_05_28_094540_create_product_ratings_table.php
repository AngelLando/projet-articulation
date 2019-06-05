<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('value');
            $table->string('comment_subject');
            $table->string('comment_description');
            
            $table->integer('user_id')->unsigned()->unique();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->integer('product_id')->unsigned()->unique();
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');;
            $table->unique(['user_id', 'product_id']);
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_ratings');
    }
}
