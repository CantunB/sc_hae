<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesrequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotesrequisitions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->references('id')->on('departments');
            $table->foreignId('requisition_id')->references('id')->on('requisitions');
            $table->foreignId('provider_id')->references('id')->on('providers');
            $table->string('quote_file')->nullable();
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
        Schema::dropIfExists('quotesrequisitions');
    }
}
