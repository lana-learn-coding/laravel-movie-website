<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesMovieTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies_movie_tags', function (Blueprint $table) {
            $table->integer("movie_id")->unsigned()->index();
            $table->foreign("movie_id")->references("id")->on("movies");

            $table->integer("movie_tags_id")->unsigned()->index();
            $table->foreign("movie_tags_id")->references("id")->on("movie_tags");

            $table->primary(["movie_id", "movie_tags_id"]);
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
        Schema::dropIfExists('movies_movie_tags');
    }
}
