<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientOzaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_oza', function (Blueprint $table) {
            $table->foreignUuid('client_id');
            $table->foreignUuid('oza_id');

            $table->primary(['client_id', 'oza_id']);

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('oza_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_oza');
    }
}
