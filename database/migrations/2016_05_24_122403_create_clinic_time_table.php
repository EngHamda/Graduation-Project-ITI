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
            $table->string('clinic_day');
            $table->string('clinic_from');
            $table->string('clinic_to');
            $table->integer('clinic_id')->unsigned();
            $table->foreign('clinic_id')->references('id')->on('clinics');
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

        Schema::drop('clinictimes',function(Blueprint $table)
        {
            $table->dropForeign('clinictimes_clinic_id_foreign');
        });
    }
}
