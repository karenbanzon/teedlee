<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title', 50)->requried();
            $table->longText('description');
            $table->string('tags', 255);
            $table->decimal('price', 10, 2);
            $table->enum('status', ['submitted', 'internal_voting', 'public_voting', 'public_voting_success', 'public_voting_fail', 'pre_production', 'production', 'publication', 'unavailable']);
            $table->timestamps();
            $table->rememberToken();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}