<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinictimes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clinic_id')->unsigned();
            $table->foreign('clinic_id')->references('id')->on('clinics');
            $table->integer('physician_id')->unsigned();
            $table->foreign('physician_id')->references('id')->on('users');
            $table->string('day'); 
            $table->string('start');
            $table->string('end');
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
//        Schema::drop('clinictimes');
        Schema::drop('clinictimes',function(Blueprint $table){
            $table->dropForeign('clinictimes_clinic_id_foreign');
            $table->dropForeign('clinictimes_physician_id_foreign');
        });
    }
}
