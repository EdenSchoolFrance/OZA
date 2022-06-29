<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdPsychosocialResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_psychosocial_responses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('never');
            $table->integer('sometimes');
            $table->integer('often');
            $table->integer('always');

            $table->foreignUuid('sd_psychosocial_group_id');
            $table->foreign('sd_psychosocial_group_id')->references('id')->on('sd_psychosocial_groups')->onDelete('cascade');

            $table->foreignUuid('psychosocial_question_id');
            $table->foreign('psychosocial_question_id')->references('id')->on('psychosocial_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sd_psychosocial_responses');
    }
}
