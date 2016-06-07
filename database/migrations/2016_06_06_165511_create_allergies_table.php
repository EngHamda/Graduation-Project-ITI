<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllergiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

 Schema::create('allergies', function (Blueprint $table) {
            $table->increments('id');
            $table->date('allergydate');
            $table->string('allergyinformation');
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
       



Schema::drop('allergies',function(Blueprint $table)
        {
            $table->dropForeign('allergies_patientprofile_id_foreign');
           
        });





    }
}
