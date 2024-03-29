<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Disciplines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Disciplines',function(Blueprint $table){
            $table->id()->unsigned();
            $table->string('name');
            $table->bigInteger('teacher')->unsigned();
            $table->integer('hours');

            $table->foreign('teacher')->references('id')->on('Teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Disciplines');
    }
}
