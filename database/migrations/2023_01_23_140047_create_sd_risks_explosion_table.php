<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdRisksExplosionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_risks_explosion', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text("material_explosion");
            $table->text("features");
            $table->text("material_setup");
            $table->text("source_clean");
            $table->text("degree_clean");
            $table->text("degree_ventilation");
            $table->text("availability_ventilation");
            $table->text("size_area");
            $table->text("gas");
            $table->text("dust");
            $table->text("spawn_probability");
            $table->text("prevention_probability");

            $table->foreignUuid('single_document_id');

            $table->foreign('single_document_id')->references('id')->on('single_documents')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sd_risks_explosion');
    }
}
