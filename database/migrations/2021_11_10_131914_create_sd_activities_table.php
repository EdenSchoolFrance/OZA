<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_activities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('text');
            
            $table->foreignUuid('sd_work_unit_id');

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
        Schema::dropIfExists('sd_activities');
    }
}
