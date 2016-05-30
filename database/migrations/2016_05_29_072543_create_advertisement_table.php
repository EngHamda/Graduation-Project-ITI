<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
Schema::create('advertisements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('advertisementname');
            $table->string('advertisementpath');
            $table->integer('medicalcompany_id')->unsigned();
            $table->foreign('medicalcompany_id')->references('id')->on('medicalcompany');
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
        
Schema::drop('advertisements',function(Blueprint $table)
        {
            $table->dropForeign('adverisements_medicalcompany_id_foreign');
        });

    }
}
