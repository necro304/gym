<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_masters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status');
            $table->unsignedInteger('customer_id');
            $table->integer('discount')->nullable();
            $table->integer('sub_total');
            $table->integer('total');
            $table->integer('total_paid');
            $table->integer('debt')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_masters');
    }
}
