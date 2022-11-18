<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdPsychosocialResponseRestraintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_psychosocial_response_restraints', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('text');
            $table->text('decision')->nullable();
            $table->date('date')->nullable();
            $table->boolean('checked');

            $table->foreignUuid('sd_psychosocial_response_id');
            $table->foreign('sd_psychosocial_response_id', 'sdPsychoResponseRestraintsSdPsychoResponse_id_foreign')->references('id')->on('sd_psychosocial_responses')->onDelete('cascade');

            $table->foreignUuid('psychosocial_response_restraint_id');
            $table->foreign('psychosocial_response_restraint_id', 'psychoResponseRestraintPsychoQuestionRestraint_id_foreign')->references('id')->on('psychosocial_question_restraints')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sd_psychosocial_response_restraints');
    }
}
