<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePatientProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patientprofiles', function (Blueprint $table) {
            $table->integer('physician_id')->unsigned();
            $table->foreign('physician_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patientprofiles', function (Blueprint $table) {

            $table->dropForeign('patientprofiles_physician_id_foreign');


        });
    }
}
