<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdPreventionsExplosionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_preventions_explosion', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('name');

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
        Schema::dropIfExists('sd_preventions_explosion');
    }
}
