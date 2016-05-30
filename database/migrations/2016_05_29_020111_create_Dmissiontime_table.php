<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmissiontimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      

Schema::create('dmissiontimes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dmissiondate');
            
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
       

 $table->dropForeign('dmissiontimes_patientprofile_id_foreign');
            $table->dropForeign('dmissiontimes_patientprofile_id_foreign');
            
            









    }
}
