<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('author');
            $table->string('title')->unique();
            $table->string('category');
            $table->string('smallContent');
            $table->text('content');
            $table->string('image')->default('default.jpg');
            $table->string('localisation');
            $table->boolean('active');

            $table->string('status');
            $table->string('type');
            $table->string('salaire');

            $table->string('avantages');
            $table->string('horaires');
            $table->string('teletravail');

            $table->string('experience');

            $table->integer('vue');
            $table->integer('postulant');
            $table->integer('likes');

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
        Schema::dropIfExists('jobs');
    }
}
