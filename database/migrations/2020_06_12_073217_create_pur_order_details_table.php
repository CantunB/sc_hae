<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pur_order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_folio')->nullable();
            $table->string('analysis_folio')->nullable();
            $table->string('coordination')->nullable();
            $table->string('department')->nullable();
            $table->string('unit_administrative')->nullable();
            $table->unsignedBigInteger('provider_id')->index();
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->unsignedBigInteger('requisition_id')->index()->nullable();
            $table->foreign('requisition_id')->references('id')->on('requisitions')->onDelete('cascade');
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
        Schema::dropIfExists('pur_order_details');
    }
}
