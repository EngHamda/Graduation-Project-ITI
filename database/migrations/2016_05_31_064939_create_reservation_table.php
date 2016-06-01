<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            //name, email, phone
            //patient_id, clinic_id, physician_id, created_at, confirmed, 
            // reservation day is array of week, reservation no. in day
            $table->enum('reservation_day', ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Sunday']); 
            $table->enum('reservation_time', ['00:00-03:00','04:00-08:00']);
            $table->integer('reservation_number');
            $table->enum('reservation_confirmed', ['unconfirmed','confirmed'])->default('unconfirmed');
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('users');
            $table->integer('physician_id')->unsigned();
            $table->foreign('physician_id')->references('id')->on('users');
            $table->integer('clinic_id')->unsigned();
            $table->foreign('clinic_id')->references('id')->on('clinics');
            $table->timestamps();// created_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reservations',function(Blueprint $table){
            $table->dropForeign('reservations_patient_id_foreign');
            $table->dropForeign('reservations_physician_id_foreign');
            $table->dropForeign('reservations_clinic_id_foreign');
        });
    }
}