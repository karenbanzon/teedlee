<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_images', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('entry_id');
            $table->longtext('path');
            $table->foreign('entry_id')->references('id')->on('entries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entry_images', function(Blueprint $table){
            $table->dropForeign(['entry_id']);
        });
        Schema::drop('entry_images');
    }
}
