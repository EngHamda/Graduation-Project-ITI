<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
 Schema::create('advertisementrequests', function (Blueprint $table) {
         $table->increments('id');
         
         $table->integer('physiciandetail_id')->unsigned();
         $table->integer('medicalcompany_id')->unsigned();
         $table->integer('advertisement_id')->unsigned();
         $table->foreign('physiciandetail_id')->references('id')->on('physiciandetails');
         $table->foreign('medicalcompany_id')->references('id')->on('medicalcompany');
         $table->foreign('advertisement_id')->references('id')->on('advertisements');
         $table->boolean('confirmed');
         $table->time('advertisementrequsttime');
         $table->date('advertisementrequstdate');
        
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
         $table->dropForeign('advertisementrequests_physiciandetail_id_foreign');
            $table->dropForeign('advertisementrequests_medicalcompany_id_foreign');
            $table->dropForeign('advertisementrequests_advertisement_id_foreign');
            
         
    }
}
