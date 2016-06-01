
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
       
Schema::create('advertisements',function(Blueprint $table){
            $table->increments("id");
            $table->integer('medicalcompany_id')->unsigned();
            $table->foreign('medicalcompany_id')->references('id')->on('medicalcompany');
            $table->string('name');
            $table->string('path');
            $table->boolean('ispayied');
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
            $table->dropForeign('advertisementsrequests_medicalcompany_id_foreign');
            
        });







    }
}
