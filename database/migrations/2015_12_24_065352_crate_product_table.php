<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('promotion_price');
            $table->string('price');
            $table->string('content');
            $table->string('image');
            $table->integer('quantity');
            $table->string('size');
            $table->string('color');
            $table->string('status');
            $table->integer('view');
            $table->integer('user');
            
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product');
    }
}
