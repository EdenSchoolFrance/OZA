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
            $table->text('name')->nullable();
            $table->text('activity')->nullable();
            $table->string("n1")->nullable();
            $table->string("n2")->nullable();
            $table->string("n3")->nullable();
            $table->string("n4")->nullable();
            $table->string("n5")->nullable();
            $table->string("n6")->nullable();
            $table->string("n7")->nullable();
            $table->string("n8")->nullable();
            $table->string("n9")->nullable();
            $table->string("n10")->nullable();
            $table->date('date')->nullable();
            $table->text('ventilation')->nullable();
            $table->text('concentration')->nullable();
            $table->text('time')->nullable();
            $table->text('protection')->nullable();
            $table->boolean("validated")->default(0);

            $table->foreignUuid('sd_work_unit_id')->nullable();
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
