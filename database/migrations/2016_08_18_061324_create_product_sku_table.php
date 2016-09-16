<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSkuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sku', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_id');
            $table->string('sku')->index();
            $table->timestamps();

            $table->foreign('sku')->references('sku')->on('sku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_sku');
    }
}