<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdRisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_risks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('frequency');
            $table->string('probability');
            $table->string('gravity');
            $table->string('impact');

            $table->foreignUuid('sd_work_unit_id');
            $table->foreignUuid('sd_danger_id');
            $table->foreignUuid('risk_id')->nullable();

            $table->foreign('sd_work_unit_id')->references('id')->on('sd_work_units')->onDelete('cascade');
            $table->foreign('sd_danger_id')->references('id')->on('sd_dangers')->onDelete('cascade');
            $table->foreign('risk_id')->references('id')->on('risks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sd_risks');
    }
}
