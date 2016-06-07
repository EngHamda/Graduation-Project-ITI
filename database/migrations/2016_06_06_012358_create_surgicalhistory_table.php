<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurgicalhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgicalhistories', function (Blueprint $table) {
            $table->increments('id');
            $table->date('surgicaldate');
            $table->string('surgicalinformation');
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
        


Schema::drop('surgicalhistories',function(Blueprint $table)
        {
            $table->dropForeign('surgicalhistories_patientprofile_id_foreign');
           
        });


    }
}
