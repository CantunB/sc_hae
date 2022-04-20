<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurOrderFeauturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pur_order_feautures', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable();
            $table->string('delivery_time')->nullable();
            $table->string('existence')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('price_term')->nullable();
            $table->string('other')->nullable();
            $table->string('program')->nullable();
            $table->string('application')->nullable();
            $table->string('vehicle')->nullable();
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
        Schema::dropIfExists('pur_order_feautures');
    }
}
