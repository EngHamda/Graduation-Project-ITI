<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question_code')->unique();
            $table->string('question_specific');
            $table->text('question_detail');
            $table->enum('is_private', ['public','private'])->default('public');
            $table->enum('is_answered', ['unanswered','answered'])->default('unanswered');
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('users');
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
        Schema::drop('questions',function(Blueprint $table){
            $table->dropForeign('questions_patient_id_foreign');
        });
    }
}