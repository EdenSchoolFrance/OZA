<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestraintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restraints', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('name');

            $table->foreignUuid('risk_id');

            $table->foreign('risk_id')->references('id')->on('risks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restraints');
    }
}
