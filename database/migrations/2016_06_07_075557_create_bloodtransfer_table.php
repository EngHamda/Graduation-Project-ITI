<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloodtransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       


Schema::create('bloodtransfers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('bloodtransferdate');
            $table->string('bloodtransfer');
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
        


Schema::drop('bloodtransfers',function(Blueprint $table)
        {
            $table->dropForeign('bloodtransfers_patientprofile_id_foreign');
           
        });




    }
}
