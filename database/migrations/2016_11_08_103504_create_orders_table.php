<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->default(0);
            $table->string('email')->default(0);
            $table->unsignedInteger('submission_id')->nullable()->default(0);
            $table->string('order_id',50);
            $table->enum('store',['shopify','teedlee']);
            $table->decimal('price',10,2);
            $table->unsignedInteger('quantity');
            $table->decimal('discount',10,2);
            $table->decimal('fee',10,2);
            $table->decimal('commission',10,2);
            $table->string('status')->default('unpaid');
            $table->text('remarks')->nullable()->default(null);
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
        Schema::dropIfExists('orders');
    }
}
