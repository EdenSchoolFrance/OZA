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
            $table->date('date')->nullable();
            $table->string('technical')->nullable();
            $table->string('organizational')->nullable();
            $table->string('human')->nullable();
            $table->boolean('exist')->default(0);

            $table->foreignUuid('sd_risk_id');

            $table->foreign('sd_risk_id')->references('id')->on('sd_risks')->onDelete('cascade');
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
