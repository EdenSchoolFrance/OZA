<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkUnitActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_unit_activity', function (Blueprint $table) {
            $table->foreignUuid('work_unit_id');
            $table->foreignUuid('activity_id');

            $table->primary(['work_unit_id', 'activity_id']);

            $table->foreign('work_unit_id')->references('id')->on('work_units');
            $table->foreign('activity_id')->references('id')->on('activities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_unit_activity');
    }
}
