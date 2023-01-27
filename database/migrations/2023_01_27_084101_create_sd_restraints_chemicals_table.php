<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdRestraintsChemicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_restraints_chemicals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('name');
            $table->text('comment');
            $table->date('date');
            $table->boolean('exist');

            $table->foreignUuid('sd_risk_chemical_id');
            $table->foreign('sd_risk_chemical_id')->references('id')->on('sd_risks_chemicals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sd_restraints_chemicals');
    }
}
