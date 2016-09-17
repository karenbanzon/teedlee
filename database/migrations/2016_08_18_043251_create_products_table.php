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
            $table->string('slug', 50)->requried();
            $table->longText('description');
            $table->string('tags', 255)->default('');
            $table->decimal('price', 10, 2)->default(0);
            $table->enum('status', ['draft', 'submitted', 'internal_voting', 'public_voting', 'public_voting_success', 'public_voting_fail', 'awaiting_orig_artwork', 'submitted_orig_artwork', 'publication', 'production', 'unavailable']);
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
