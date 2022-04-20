<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurOrderMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pur_order_material', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('departure');
            $table->string('quantity');
            $table->string('unit');
            $table->string('concept');
            $table->decimal('unit_cost',10,2);
            $table->decimal('cost_quantity',10,2);
            $table->decimal('cost_amount',10,2);
            $table->integer('p_disc');
            $table->decimal('discount',10,2);
            $table->decimal('subtotal',10,2);
            $table->integer('p_iva');
            $table->decimal('iva',10,2);
            $table->decimal('total_order',10,2);
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
        Schema::dropIfExists('pur_order_material');
    }
}
