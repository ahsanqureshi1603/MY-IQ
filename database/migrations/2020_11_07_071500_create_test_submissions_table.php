<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_submissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('test_id');
            $table->integer('question_id');
            $table->integer('answer_id');
            $table->integer('current_question_number');
            $table->integer('time_spent')->nullable();
            $table->boolean('flagged');
            $table->longText('notes');
            $table->string('test_type'); //mock, practice or quiz
            $table->timestamps();
            $table->json('data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_submissions');
    }
}
