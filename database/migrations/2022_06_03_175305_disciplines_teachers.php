<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DisciplinesTeachers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Disciplines_Teachers',function(Blueprint $table){
            $table->bigInteger('discipline')->unsigned();
            $table->foreign('discipline')->references('id')->on('Disciplines');
            $table->bigInteger('teacher')->unsigned();
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
        Schema::drop('Disciplines_Teachers');
    }
}
