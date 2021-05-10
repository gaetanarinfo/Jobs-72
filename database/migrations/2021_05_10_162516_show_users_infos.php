<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShowUsersInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('show_username')->default(0)->nullable();
            $table->boolean('show_email')->default(0)->nullable();
            $table->boolean('show_lastname')->default(0)->nullable();
            $table->boolean('show_firstname')->default(0)->nullable();
            $table->boolean('show_phone')->default(0)->nullable();
            $table->boolean('show_cv')->default(0)->nullable();
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
