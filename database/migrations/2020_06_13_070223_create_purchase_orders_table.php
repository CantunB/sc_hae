<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('accountant');
            $table->foreignId('department_id')->references('id')->on('departments');
            $table->foreignId('pur_order_details_id')->references('id')->on('pur_order_details');
            $table->foreignId('pur_order_material_id')->references('id')->on('pur_order_material');
            $table->foreignId('pur_order_features_id')->references('id')->on('pur_order_feautures');
            $table->string('observation')->nullable();
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
        Schema::dropIfExists('purchase_orders');
    }
}
