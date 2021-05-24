<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class News extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('author');
            $table->string('title')->unique();
            $table->string('category');
            $table->string('smallContent');
            $table->text('content');
            $table->string('image')->default('default.jpg');
            $table->boolean('active');
            $table->integer('vue');
            $table->integer('likes');
            $table->integer('comments');
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
        Schema::dropIfExists('news');
    }
}
