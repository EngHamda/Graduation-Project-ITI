<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familyhistories', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('familyhistory');
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
        

Schema::drop('familyhistories',function(Blueprint $table)
        {
            $table->dropForeign('familyhistories_patientprofile_id_foreign');
           
        });
 



    }
}
