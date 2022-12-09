<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdPsychosocialGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_psychosocial_groups', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->integer('number_quiz')->default(0);
            $table->float('stress_level', 5, 1)->default(0);
            $table->float('employee', 5, 1)->default(0);
            $table->boolean('validated')->default(0);

            $table->foreignUuid('single_document_id');
            $table->foreign('single_document_id')->references('id')->on('single_documents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sd_psychosocial_groups');
    }
}
