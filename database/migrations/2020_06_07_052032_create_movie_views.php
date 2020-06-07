<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_views', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->integer("view")->unsigned();

            $table->integer("movie_id")->unsigned()->index();
            $table->foreign("movie_id")->references("id")->on("movies");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_views');
    }
}
