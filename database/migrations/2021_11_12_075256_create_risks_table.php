<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('name');
            $table->string('frequency');
            $table->string('probability');
            $table->string('gravity');
            $table->string('impact');

            $table->foreignUuid('danger_id');
            $table->foreignUuid('domain_activity_id');

            $table->foreign('domain_activity_id')->references('id')->on('domain_activities')->onDelete('cascade');
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
        Schema::dropIfExists('risks');
    }
}
