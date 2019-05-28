<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormatPackagingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('format_packaging', function (Blueprint $table) {
            $table->integer('format_id')->unsigned();
            $table->integer('packaging_id')->unsigned();
            $table->foreign('format_id')->references('id')->on('formats');
            $table->foreign('packaging_id')->references('id')->on('packagings');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('format_packaging');
    }
}
