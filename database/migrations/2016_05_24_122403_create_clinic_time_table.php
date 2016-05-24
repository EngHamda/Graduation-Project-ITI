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
            $table->string('clinic_id');
            $table->rememberToken();
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
        Schema::drop('clinictimes');
    }
}
