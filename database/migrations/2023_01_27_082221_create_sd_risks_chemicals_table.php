<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdRisksChemicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_risks_chemicals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('name');
            $table->text('activity');
            $table->string("n1");
            $table->string("n2");
            $table->string("n3");
            $table->string("n4");
            $table->string("n5");
            $table->string("n6");
            $table->string("n7");
            $table->string("n8");
            $table->string("n9");
            $table->string("n10");
            $table->date('date');
            $table->text('ventilation');
            $table->text('concentration');
            $table->text('time');
            $table->text('protection');

            $table->foreignUuid('sd_work_unit_id');
            $table->foreign('sd_work_unit_id')->references('id')->on('sd_work_units')->onDelete('cascade');

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
        Schema::dropIfExists('sd_risks_chemicals');
    }
}
