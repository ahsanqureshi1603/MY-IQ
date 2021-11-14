<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticeTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_tests', function (Blueprint $table) {
            $table->string('id')->unique()->primary();
            $table->integer('user_id');
            $table->string('category')->nullable(); //only one category at a time
            $table->json('question_type')->nullable();
            $table->json('subjects')->nullable();
            $table->json('difficulty')->nullable();
            $table->string('question_pool')->nullable();
            $table->integer('number_of_questions')->nullable();
            $table->integer('time_limit')->nullable();
            $table->string('mode');
            $table->integer('current_question_number')->nullable();
            $table->integer('current_question_time_spent')->nullable();
            $table->string('status')->nullable();
            $table->integer('time_remaining')->nullable();
            $table->integer('current_question_id')->nullable();
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
        Schema::dropIfExists('practice_tests');
    }
}
