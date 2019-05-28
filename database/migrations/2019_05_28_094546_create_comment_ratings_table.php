<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_ratings', function (Blueprint $table) {
            $table->integer('value');
         
            $table->integer('user_id')->unsigned()->unique();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->integer('product_rating_id')->unsigned()->unique();
            $table->foreign('product_rating_id')
                ->references('id')
                ->on('product_ratings');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_ratings');
    }
}
