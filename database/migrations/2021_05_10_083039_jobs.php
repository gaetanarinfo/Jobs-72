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
            $table->boolean('active')->default(0)->nullable();

            $table->string('status');
            $table->string('type');
            $table->string('salaire');

            $table->string('avantages');
            $table->string('horaires');
            $table->boolean('teletravail')->nullable();

            $table->string('experience');
            $table->boolean('experience_exiger')->default(0);

            $table->string('poste');

            $table->integer('vue')->default(0)->nullable();
            $table->integer('apply')->default(0)->nullable();
            $table->integer('likes')->default(0)->nullable();

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
