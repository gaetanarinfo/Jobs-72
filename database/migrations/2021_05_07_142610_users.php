<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('avatar')->default('default.jpg');
            $table->string('password');
            $table->string('roles')->default('ROLES_USER');
            $table->boolean('notification_news')->default(1)->nullable();
            $table->boolean('notification_newsletter')->default(1)->nullable();
            $table->boolean('notification_jobs')->default(1)->nullable();
            $table->boolean('show_username')->default(0);
            $table->boolean('show_email')->default(0);
            $table->boolean('show_lastname')->default(0);
            $table->boolean('show_firstname')->default(0);
            $table->boolean('show_phone')->default(0);
            $table->boolean('show_cv')->default(0);
            $table->string('cv')->nullable();
            $table->rememberToken();
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
       Schema::dropIfExists('users');
    }
}
