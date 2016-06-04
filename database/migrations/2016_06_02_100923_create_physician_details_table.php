<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysicianDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physiciandetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('certification');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('clinic_id')->unsigned();
            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
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
        Schema::drop('physiciandetails');

    }
}
