<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoordinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('colony_dependency')->nullable();
            $table->string('address_dependency')->nullable();
            $table->string('telephone_dependency')->nullable();
            $table->string('email_dependency')->nullable()->unique();
            $table->tinyInteger('status')->default('1');
        });
        Schema::create('coordinations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->tinyInteger('status')->default('1');
        });
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->tinyInteger('status')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dependencies');
        Schema::dropIfExists('coordinations');
        Schema::dropIfExists('departments');
    }
}
