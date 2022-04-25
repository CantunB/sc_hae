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
            $table->id();
            $table->string('order_folio')->nullable();
            $table->string('analysis_folio')->nullable();
            $table->string('coordination')->nullable();
            $table->string('department')->nullable();
            $table->string('unit_administrative')->nullable();
            $table->foreignId('provider_id')->references('id')->on('providers');
            $table->foreignId('department_id')->references('id')->on('departments');
            $table->foreignId('requisition_id')->references('id')->on('requisitions');
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
