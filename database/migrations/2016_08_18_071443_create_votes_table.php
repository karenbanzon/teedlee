<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['internal', 'external']);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('submission_id')->required();
            $table->decimal('rating', 4, 2);
            $table->string('comment', 1024);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('submission_id')->references('id')->on('submissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('votes');
    }
}
