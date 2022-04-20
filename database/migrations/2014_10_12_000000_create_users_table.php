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
            $table->bigIncrements('id');
            $table->string('NoEmpleado')->unique();
            $table->string('name');
            $table->string('no_seg_soc')->nullable()->default('N/A');
            $table->string('categoria')->nullable()->default('N/A');
            $table->string('nivel')->nullable()->default('N/A');
            $table->string('rfc')->nullable()->default('N/A');
            $table->string('curp')->nullable()->default('N/A');
            $table->string('fe_nacimiento')->nullable()->default('N/A');
            $table->string('fe_ingreso')->nullable()->default('N/A');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable()->default('$2y$10$MPnTD/M.2EGZzHbnRQafd.yUG.3bWAUi5d9dzfX/6PXOX0J4.hv/C');
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
