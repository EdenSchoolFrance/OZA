<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdExpositionQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_exposition_questions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('intervention_type');
            $table->integer('number_employee');
            $table->integer('minutes')->nullable();
            $table->integer('value');

            $table->foreignUuid('sd_work_unit_id');
            $table->foreign('sd_work_unit_id')->references('id')->on('sd_work_units');

            $table->foreignUuid('exposition_question_id');
            $table->foreign('exposition_question_id')->references('id')->on('exposition_questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sd_exposition_questions');
    }
}
