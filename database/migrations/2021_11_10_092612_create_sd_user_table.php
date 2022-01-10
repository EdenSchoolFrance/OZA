<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_user', function (Blueprint $table) {
            $table->foreignUuid('single_document_id');
            $table->foreignUuid('user_id');

            $table->primary(['single_document_id', 'user_id']);

            $table->foreign('single_document_id')->references('id')->on('single_documents')->onDelete('cascade');
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
        Schema::dropIfExists('sd_user');
    }
}
