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
            $table->dateTime('start')->nullable()->default(null);
            $table->dateTime('end')->nullable()->default(null);
            $table->string('banner')->required();
            $table->longText('description')->required();
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
        Schema::dropIfExists('contests');
    }
}
