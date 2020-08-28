<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('total_episodes')->nullable();

            $table->date('release_date');
            $table->smallInteger('length')->unsigned();


            $table->integer('movie_category_id')->unsigned()->index()->nullable();
            $table->foreign('movie_category_id')->references('id')->on('movie_categories');
            $table->integer('movie_language_id')->unsigned()->index()->nullable();
            $table->foreign('movie_language_id')->references('id')->on('movie_languages');
            $table->integer('movie_nation_id')->unsigned()->index()->nullable();
            $table->foreign('movie_nation_id')->references('id')->on('movie_nations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
