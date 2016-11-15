<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContestIdToSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('submissions', function (Blueprint $table) {
            $table->unsignedInteger('contest_id')->after('user_id')->nullable()->default(null);
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
        Schema::table('submissions', function (Blueprint $table) {
            $table->dropForeign(['contest_id']);
            $table->dropColumn('contest_id');
        });
    }
}
