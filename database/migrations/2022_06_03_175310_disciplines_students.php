<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DisciplinesStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Disciplines_Students',function(Blueprint $table){
            $table->bigInteger('discipline')->unsigned();
            $table->foreign('discipline')->references('id')->on('Disciplines');
            $table->bigInteger('student')->unsigned();
            $table->foreign('student')->references('id')->on('Students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Disciplines_Students');
    }
}
