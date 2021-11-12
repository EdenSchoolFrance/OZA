<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_activity', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('text')->nullable();
            $table->foreignUuid('sd_work_unit_id')->nullable();

            $table->foreign('sd_work_unit_id')->references('id')->on('sd_work_units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sd_activity');
    }
}
