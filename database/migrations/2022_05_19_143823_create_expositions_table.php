<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expositions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('info');
            $table->text('alert');

            $table->foreignUuid('danger_id');
            $table->foreign('danger_id')->references('id')->on('dangers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expositions');
    }
}
