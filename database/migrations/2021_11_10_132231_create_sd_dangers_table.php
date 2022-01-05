<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdDangersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('sd_dangers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('reflection')->nullable();
            $table->text('comment')->nullable();
            $table->boolean('ut_all')->nullable();
            $table->boolean('validated')->default(0);
            
            $table->foreignUuid('single_document_id');
            $table->foreignUuid('danger_id');

            $table->foreign('single_document_id')->references('id')->on('single_documents')->onDelete('cascade');
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
        Schema::dropIfExists('sd_dangers');
    }
}
