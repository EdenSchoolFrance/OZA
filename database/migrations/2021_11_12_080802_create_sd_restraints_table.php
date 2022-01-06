<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdRestraintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_restraints', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('technical');
            $table->string('organizational');
            $table->string('human');

            $table->foreignUuid('sd_risk_id');
            $table->foreignUuid('restraint_id')->nullable();

            $table->foreign('sd_risk_id')->references('id')->on('sd_risks')->onDelete('cascade');
            $table->foreign('restraint_id')->references('id')->on('restraints')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sd_restraints');
    }
}
