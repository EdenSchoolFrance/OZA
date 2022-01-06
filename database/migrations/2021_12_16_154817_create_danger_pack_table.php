<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDangerPackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danger_pack', function (Blueprint $table) {
            $table->foreignUuid('danger_id');
            $table->foreignUuid('pack_id');
            $table->boolean('exist')->nullable();

            $table->primary(['danger_id', 'pack_id']);

            $table->foreign('danger_id')->references('id')->on('dangers')->onDelete('cascade');
            $table->foreign('pack_id')->references('id')->on('packs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danger_pack');
    }
}
