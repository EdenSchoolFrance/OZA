<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpositionQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exposition_questions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('intensity');
            $table->text('options')->nullable();

            $table->foreignUuid('exposition_group_id');
            $table->foreign('exposition_group_id')->references('id')->on('exposition_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exposition_questions');
    }
}
