<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiscarriageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       

 Schema::create('miscarriages', function (Blueprint $table) {
            $table->increments('id');
            $table->date('miscarriagedate');
            $table->string('miscarriage');
            $table->integer('patientprofile_id')->unsigned();
            $table->foreign('patientprofile_id')->references('id')->on('patientprofiles');
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
      


Schema::drop('miscarriages',function(Blueprint $table)
        {
            $table->dropForeign('miscarriages_patientprofile_id_foreign');
           
        });


    }
}
