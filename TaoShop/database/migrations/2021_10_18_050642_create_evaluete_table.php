<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvalueteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluete', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('acount_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('star');
            $table->text('commend');
            $table->timestamps();
            $table->foreign('acount_id')->references('Acount_id')->on('tbl_acount');
            $table->foreign('product_id')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluete');
    }
}
