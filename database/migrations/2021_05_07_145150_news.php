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
            $table->string('smallContent');
            $table->text('content');
            $table->string('image')->default('default.jpg');
            $table->boolean('active');
            // $table->bigInteger('comments_id')->unsigned();
            $table->timestamps();
            // $table->foreign('comments_id')->references('id')->on('comments');
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
