<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsychosocialQuestionRestraintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psychosocial_question_restraints', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('text');

            $table->foreignUuid('psychosocial_question_id');
            $table->foreign('psychosocial_question_id', 'psychosocialQuestionRestraintsPsychosocialQuestion_id_foreign')->references('id')->on('psychosocial_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('psychosocial_question_restraints');
    }
}
