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
            $table->text('name');
            $table->integer('number_employee');
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
        Schema::dropIfExists('sd_work_units');
    }
}
