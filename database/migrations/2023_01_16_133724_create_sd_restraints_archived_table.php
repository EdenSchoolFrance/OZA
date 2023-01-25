<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdRestraintsArchivedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_restraints_archived', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('name');
            $table->date('date');
            $table->string('technical');
            $table->string('organizational');
            $table->string('human');
            $table->boolean('exist')->default(0);
            $table->float('rr');
            $table->text('sd_work_unit_name');
            $table->text('danger_name');
            $table->text('sd_risk_name');

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
        Schema::dropIfExists('sd_restraints_archived');
    }
}
