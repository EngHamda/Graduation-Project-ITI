<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasthistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
 Schema::create('pasthistories', function (Blueprint $table) {
            $table->increments('id');
            $table->date('pasthistorydate');
            $table->string('historyinformation');
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
       
Schema::drop('pasthistories',function(Blueprint $table)
        {
            $table->dropForeign('pasthistories_patientprofile_id_foreign');
           
        });



    }
}
