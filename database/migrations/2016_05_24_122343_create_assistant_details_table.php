<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssistantDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistantdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clinic_id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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

        Schema::drop('assistantdetails',function(Blueprint $table)
        {
            $table->dropForeign('assistantdetails_user_id_foreign');
        });
    }
}
