<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('NoEmpleado')->unique();
            $table->string('name');
            $table->string('no_seg_soc')->nullable();
            $table->string('categoria')->nullable();
            $table->string('nivel')->nullable();
            $table->string('rfc')->nullable();
            $table->string('curp')->nullable();
            $table->string('fe_nacimiento')->nullable();
            $table->string('fe_ingreso')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at');
            $table->string('password');
            $table->string('file_user')->default('default.png');
            $table->tinyInteger('status')->default('1');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
