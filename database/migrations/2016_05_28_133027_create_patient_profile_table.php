<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
Schema::create('patientprofiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patientweight');
            $table->integer('patientheight');
            $table->string('patientbloodgroup');
            $table->string('patientemergencyphone');
            $table->string('patientnationality');
            $table->string('patientnationalid');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
         Schema::drop('patientprofiles',function(Blueprint $table)
        {
            $table->dropForeign('patientprofiles_user_id_foreign');
        });
    }
   
}
