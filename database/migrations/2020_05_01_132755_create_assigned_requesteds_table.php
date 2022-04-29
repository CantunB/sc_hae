<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedRequestedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_requesteds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requisition_id')->references('id')->on('requisitions')->onDelete('cascade');
            $table->foreignId('requested_id')->references('id')->on('requesteds')->onDelete('cascade');
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
        Schema::dropIfExists('assigned_requesteds');
    }
}
