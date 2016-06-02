<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePhysicianDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('physiciandetails', function (Blueprint $table) {

            $table->integer('speciality_id')->unsigned();
            $table->foreign('speciality_id')->references('id')->on('speciality')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('physiciandetails', function (Blueprint $table) {


            $table->dropForeign('physiciandetails_speciality_id_foreign');

        });
    }
}
