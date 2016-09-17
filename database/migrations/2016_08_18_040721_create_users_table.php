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
            $table->string('username')->unique()->nullable();
            $table->string('password');
            $table->string('firstname', 30)->nullable();
            $table->string('lastname', 30)->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('mobile', 30)->nullable();
            $table->enum('gender', ['male','female'])->default('male');
            $table->string('address', 50)->nullable();
            $table->string('address2', 50)->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->unsignedInteger('province_id')->nullable();
            $table->longText('about_me')->nullable();
            $table->string('avatar')->default('http://www.24city.org/images/no-photo.jpg');
            $table->string('website')->nullable();
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
