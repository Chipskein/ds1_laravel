<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Classes extends Migration
{
    public function up()
    {
        Schema::create('Classes',function(Blueprint $table){
            $table->bigInteger('discipline')->unsigned();
            $table->bigInteger('student')->unsigned();
            $table->date('date');
            $table->boolean('isPresent');
            
            $table->foreign('discipline')->references('id')->on('Disciplines');
            $table->foreign('student')->references('id')->on('Students');
            
            $keys=array('discipline','student','date');
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
        Schema::drop('Classes');
    }
}
