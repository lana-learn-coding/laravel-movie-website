<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieUserCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_user_comment', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('comment');

            $table->integer('parent_comment_id')->unsigned()->index();
            $table->foreign('parent_comment_id')->references('id')->on('movie_user_comment')->onDelete('cascade');
            $table->integer('movie_id')->unsigned()->index();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_user_comment');
    }
}
