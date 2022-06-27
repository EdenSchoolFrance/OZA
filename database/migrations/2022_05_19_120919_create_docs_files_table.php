<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocsFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docs_files', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->date('date');

            $table->foreignUuid('doc_id');
            $table->foreign('doc_id')->references('id')->on('docs');

            $table->foreignUuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docs_files');
    }
}
