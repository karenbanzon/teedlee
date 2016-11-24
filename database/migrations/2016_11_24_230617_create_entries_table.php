<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('contest_id');
            $table->foreign('contest_id')->references('id')->on('contests');
            $table->string('title', 50)->requried();
            $table->longText('description');
            $table->string('tags', 255)->nullable()->default(null);
            $table->enum('status', ['draft', 'submitted', 'internal_voting', 'internal_voting_fail', 'public_voting', 'public_voting_success', 'public_voting_fail', 'awaiting_orig_artwork', 'orig_artwork_submitted', 'orig_artwork_resubmit', 'orig_artwork_declined', 'publication', 'unavailable']);
            $table->string('declined_reason')->nullable()->default(null);
            $table->string('shopify_link')->default('http://shop.teedlee.ph/');
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
        Schema::table('entries', function (Blueprint $table) {
            $table->dropForeign(['contest_id']);
            $table->dropColumn('contest_id');
        });

        Schema::dropIfExists('entries');
    }
}