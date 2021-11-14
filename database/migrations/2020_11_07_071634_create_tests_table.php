<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->string('id')->unique()->primary();
            $table->integer('user_id');
            $table->string('category_order')->nullable();
            $table->string('current_category')->nullable();
            $table->integer('current_question_number')->nullable();
            $table->integer('current_question_time_spent')->nullable();
            $table->string('current_section')->nullable();
            $table->integer('current_question_id')->nullable();
            $table->integer('section_cr_count')->nullable();
            $table->integer('section_ds_count')->nullable();
            $table->integer('section_ps_count')->nullable();
            $table->integer('section_rc_count')->nullable();
            $table->integer('section_sc_count')->nullable();
            $table->string('status');
            $table->integer('math_time_remaining')->nullable();
            $table->integer('verbal_time_remaining')->nullable();
            $table->integer('pause_time_remaining')->nullable();
            $table->timestamp('test_start_time')->useCurrent();
            $table->timestamp('test_end_time')->useCurrent();
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
        Schema::dropIfExists('tests');
    }
}
