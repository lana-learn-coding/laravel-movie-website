<?php

use App\Models\Cast;
use App\Models\Movie\Movie;
use App\Models\Movie\MovieCategory;
use App\Models\Movie\MovieGenre;
use App\Models\Movie\MovieLanguage;
use App\Models\Movie\MovieNation;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Movie::class, 3000)->create();
        foreach (Movie::all() as $movie) {
            $castRatio = rand(1, 5);
            $genreRatio = rand(2, 6);
            foreach (Cast::all()->random($castRatio) as $cast)
                $movie->casts()->attach($cast->id);
            foreach (MovieGenre::all()->random($genreRatio) as $genre) {
                $movie->genres()->attach($genre->id);
            }
            $movie->category()->associate(MovieCategory::all()->random());
            $movie->language()->associate(MovieLanguage::all()->random());
            $movie->nation()->associate(MovieNation::all()->random());
            $movie->save();
        }
    }
}
