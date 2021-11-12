<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdWorkUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_work_units', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->integer('number_employee');
            $table->boolean('validate')->default(0);
            $table->foreignUuid('work_unit_id')->nullable();
            $table->foreignUuid('single_document_id');

            $table->foreign('work_unit_id')->references('id')->on('work_units');
            $table->foreign('single_document_id')->references('id')->on('single_document');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sd_work_units');
    }
}
