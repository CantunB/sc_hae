<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedUserAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('assigned_user_areas', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('areas_id')->references('id')->on('dependency_relation');
        //     $table->foreignId('user_id')->references('id')->on('users');
        //     $table->tinyInteger('status')->default('1');
        //     $table->timestamps();
        // });
        Schema::create('user_dependencies', function (Blueprint $table) {
            $table->foreignId('director_id')->references('id')->on('users');
            $table->foreignId('dependency_id')->references('id')->on('dependencies');
        });
        Schema::create('user_coordination', function (Blueprint $table) {
            $table->foreignId('titular_id')->references('id')->on('users');
            $table->foreignId('coordination_id')->references('id')->on('coordinations');

        });
        Schema::create('user_department', function (Blueprint $table) {
            $table->foreignId('jefe_id')->references('id')->on('users');
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
        // Schema::dropIfExists('assigned_user_areas');
        Schema::dropIfExists('user_dependencies');
        Schema::dropIfExists('user_coordination');
        Schema::dropIfExists('user_department');
    }
}
