<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSingleDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_documents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('name_enterprise')->nullable();
            $table->string('adress')->nullable();
            $table->string('additional_adress')->nullable();
            $table->string('city_zipcode')->nullable();
            $table->string('city')->nullable();
            $table->text('description')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('single_documents');
    }
}
