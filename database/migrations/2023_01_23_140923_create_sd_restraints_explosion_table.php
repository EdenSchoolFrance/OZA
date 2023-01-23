<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdRestraintsExplosionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_restraints_explosion', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text("name");
            $table->text("comment")->nullable();
            $table->date("date")->nullable();
            $table->boolean("exist")->default(1);

            $table->foreignUuid('sd_risk_explosion_id');

            $table->foreign('sd_risk_explosion_id')->references('id')->on('sd_risks_explosion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sd_restraints_explosion');
    }
}
