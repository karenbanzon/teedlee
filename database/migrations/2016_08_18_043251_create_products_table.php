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
        Schema::create('submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title', 50)->requried();
            $table->string('slug', 50)->nullable()->default(null);
            $table->longText('description');
            $table->string('tags', 255)->nullable()->default(null);
            $table->decimal('price', 10, 2)->default(0);
            $table->dateTime('internal_voting_start')->nullable()->default(null);
            $table->dateTime('public_voting_start')->nullable()->default(null);
            $table->enum('status', ['draft', 'submitted', 'internal_voting', 'internal_voting_fail', 'public_voting', 'public_voting_success', 'public_voting_fail', 'awaiting_orig_artwork', 'orig_artwork_submitted', 'orig_artwork_resubmit', 'orig_artwork_declined', 'publication', 'unavailable']);
            $table->string('declined_reason')->nullable()->default(null);
            $table->string('shopify_link')->default('http://teedlee.myshopify.com/');
            $table->timestamps();

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
        Schema::drop('submissions');
    }
}
