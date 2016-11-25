<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest_votes', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['internal', 'external']);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('contest_id')->required();
            $table->decimal('rating', 1, 0);
            $table->string('comment', 1024);
            $table->string('flags')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('contest_id')->references('id')->on('contests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('contest_votes', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('contest_id');
        });

        Schema::dropIfExists('contest_votes');
    }
}
