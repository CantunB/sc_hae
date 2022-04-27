<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependency_coordination', function (Blueprint $table) {
            $table->foreignId('dependency_id')->references('id')->on('dependencies');
            $table->foreignId('coordination_id')->references('id')->on('coordinations');
        });
        Schema::create('coordination_department', function (Blueprint $table) {
            $table->foreignId('coordination_id')->references('id')->on('coordinations');
            $table->foreignId('department_id')->references('id')->on('departments');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dependency_coordination');
        Schema::dropIfExists('coordination_department');
    }
}
