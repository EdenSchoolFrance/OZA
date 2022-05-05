<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_units', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('name')->nullable();
            $table->foreignUuid('sector_activity_id');

            $table->foreign('sector_activity_id')->references('id')->on('sector_activities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_units');
    }
}
