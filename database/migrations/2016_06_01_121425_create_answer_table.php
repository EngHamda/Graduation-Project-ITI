<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('answer_specific');
            $table->text('answer_detail');
            $table->integer('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions');
            $table->integer('physician_id')->unsigned();
            $table->foreign('physician_id')->references('id')->on('users');
            $table->integer('speciality_id')->unsigned();
            $table->foreign('speciality_id')->references('id')->on('specialities');
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
        Schema::drop('answers',function(Blueprint $table){
            $table->dropForeign('answers_question_id_foreign');
            $table->dropForeign('answers_physician_id_foreign');
            $table->dropForeign('answers_speciality_id_foreign');
        });
    }
}