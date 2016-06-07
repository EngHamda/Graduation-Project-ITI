<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

Schema::create('prescriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('drug');
            $table->string('duration');
            $table->string('frequency');
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
       

Schema::drop('prescriptions',function(Blueprint $table)
        {
            $table->dropForeign('prescriptions_patientprofile_id_foreign');
           
        });





    }
}
