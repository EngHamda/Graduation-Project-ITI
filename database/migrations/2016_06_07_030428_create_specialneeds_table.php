<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialneedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      


 Schema::create('specialneeds', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('specialneedinformation');
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
        
Schema::drop('specialneeds',function(Blueprint $table)
        {
            $table->dropForeign('specialneeds_patientprofile_id_foreign');
           
        });
    }
}
