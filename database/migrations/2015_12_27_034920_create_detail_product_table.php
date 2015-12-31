<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("detailproduct",function(Blueprint $table){
            $table->increments('id');
            $table->string('images');
            $table->string('silebar_images');
            $table->string('infomation');
            $table->string('size');
            $table->string('color');
            $table->string('comment');
            $table->string('data_sheet');
            $table->Integer('productID');
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
        Schema::drop("detailproduct");
    }
}
