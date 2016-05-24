<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysicianDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physiciandetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
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
        Schema::drop('physiciandetails',function(Blueprint $table)
        {
            $table->dropForeign('physiciandetails_user_id_foreign');
        });
    }
}
