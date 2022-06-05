<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DisciplinesStudents extends Migration
{
    public function up()
    {
        Schema::create('Disciplines_Students',function(Blueprint $table){
            $table->bigInteger('discipline')->unsigned();
            $table->bigInteger('student')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->float('final_note');
            $table->float('final_freq');
            $table->string('status');
            $table->foreign('discipline')->references('id')->on('Disciplines');
            $table->foreign('student')->references('id')->on('Students');
            $keys=array('discipline','student');
            $table->primary($keys);
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
