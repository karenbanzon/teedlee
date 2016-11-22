<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCloseAtFieldToContestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contests', function (Blueprint $table) {
            $table->renameColumn('start','start_at');
            $table->renameColumn('end','end_at');
            $table->dateTime('close_at')->nullable()->default(null)->after('end');
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
            $table->renameColumn('start_at','start');
            $table->renameColumn('end_at','end');
            $table->dropColumn('close_at');
        });
    }
}
