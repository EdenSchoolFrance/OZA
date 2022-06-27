<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpositionGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exposition_groups', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('calculation');
            $table->string('intervention_type_label');
            $table->string('value_label')->nullable();
            $table->string('duration');
            $table->string('type');

            $table->foreignUuid('exposition_id');
            $table->foreign('exposition_id')->references('id')->on('expositions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exposition_groups');
    }
}
