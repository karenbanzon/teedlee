<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title', 30)->required();
            $table->dateTime('start_at')->nullable()->default(null);
            $table->dateTime('end_at')->nullable()->default(null);
            $table->string('banner')->required();
            $table->longText('description')->required();
            $table->enum('status', ['draft', 'submission_closed', 'submission_open', 'submission_ended', 'voting_open', 'voting_ended', 'awaiting_winners', 'closed', 'awaiting_orig_artwork', 'orig_artwork_submitted', 'orig_artwork_resubmit', 'orig_artwork_declined', 'publication', 'unavailable']);
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
        Schema::table('contests', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('contests');
    }
}
