<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_requisitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('accountant');
          /*  $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade'); */
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           // $table->integer('coordination_id')->unsigned();
           // $table->integer('department_id')->unsigned();
            $table->unsignedBigInteger('requisition_id')->index();
            $table->foreign('requisition_id')->references('id')->on('requisitions')->onDelete('cascade');
            $table->tinyInteger('status')->default('0');
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
        Schema::dropIfExists('assigned_requisitions');
    }
}
