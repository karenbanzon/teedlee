<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveStatusFromEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entries', function (Blueprint $table) {
//            $table->dropColumn('status');
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
//            $table->enum('status', ['draft', 'submitted', 'internal_voting', 'internal_voting_fail', 'public_voting', 'public_voting_success', 'public_voting_fail', 'awaiting_orig_artwork', 'orig_artwork_submitted', 'orig_artwork_resubmit', 'orig_artwork_declined', 'publication', 'unavailable'])->after('tags');
        });
    }
}
