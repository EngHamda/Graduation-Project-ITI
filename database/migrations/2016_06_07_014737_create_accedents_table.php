<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccedentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
 Schema::create('accedents', function (Blueprint $table) {
            $table->increments('id');
            $table->date('accedentdate');
            $table->string('accedentinformation');
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
       

Schema::drop('accedents',function(Blueprint $table)
        {
            $table->dropForeign('accedents_patientprofile_id_foreign');
           
        });






    }
}
