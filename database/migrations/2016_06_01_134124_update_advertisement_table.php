<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAdvertisementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertisement',function(Blueprint $table){
            $table->integer('medicalcompany_id')->unsigned();
            $table->foreign('medicalcompany_id')->references('id')->on('medicalcompany');
            $table->boolean('is_paid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advertisement',function(Blueprint $table){
            $table->dropForeign('advertisement_medicalcompany_id_foreign');
        });
    }
}
