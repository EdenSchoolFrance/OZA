<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkUnitItemTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_unit_item_tables', function (Blueprint $table) {
            $table->foreignUuid('work_unit_id');
            $table->foreignUuid('child_sub_item_id');

            $table->primary(['work_unit_id', 'child_sub_item_id']);

            $table->foreign('work_unit_id')->references('id')->on('work_units')->onDelete('cascade');
            $table->foreign('child_sub_item_id')->references('id')->on('child_sub_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_unit_item_tables');
    }
}
