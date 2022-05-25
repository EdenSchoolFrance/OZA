<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdDangerSdWorkUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_danger_sd_work_unit', function (Blueprint $table) {
            $table->foreignUuid('sd_danger_id');
            $table->foreignUuid('sd_work_unit_id');
            $table->boolean('exist')->nullable();
            $table->boolean('exposition')->nullable();

            $table->primary(['sd_danger_id', 'sd_work_unit_id']);

            $table->foreign('sd_danger_id')->references('id')->on('sd_dangers')->onDelete('cascade');
            $table->foreign('sd_work_unit_id')->references('id')->on('sd_work_units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sd_danger_sd_work_unit');
    }
}
