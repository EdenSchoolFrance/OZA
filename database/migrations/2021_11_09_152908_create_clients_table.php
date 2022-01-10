<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('client_number');
            $table->string('adress');
            $table->string('additional_adress')->nullable();
            $table->string('city_zipcode');
            $table->string('city');
            $table->boolean('archived')->default(0);
            $table->foreignUuid('expert_id')->nullable();
            
            $table->foreign('expert_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
