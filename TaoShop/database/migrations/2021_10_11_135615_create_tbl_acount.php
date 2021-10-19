<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAcount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_acount', function (Blueprint $table) {
            $table->increments('Acount_id');
            $table->string('Acount_name');
            $table->string('PassWord');
            $table->string('Full_name');
            $table->string('Acount_email',100);
            $table->string('Adress');
            $table->string('Phone');
            $table->integer('Role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_acount');
    }
}
