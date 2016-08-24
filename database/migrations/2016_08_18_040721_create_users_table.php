<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_group_id');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('firstname', 30);
            $table->string('lastname', 30);
            $table->string('phone', 30);
            $table->string('mobile', 30);
            $table->enum('gender', ['male','female']);
            $table->string('address', 50);
            $table->string('address2', 50);
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('province_id');
            $table->longText('about_me');
            $table->string('avatar');
            $table->string('website');
            $table->enum('status',['inactive','active','banned'])->default('inactive');
            $table->boolean('is_premium')->default(false);
            $table->boolean('is_profile_complete')->default(false);
            $table->timestamps();
            $table->rememberToken();

            $table->foreign('user_group_id')->references('id')->on('user_groups');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
