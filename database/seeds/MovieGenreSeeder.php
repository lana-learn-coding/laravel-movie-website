<?php

use App\Models\Movie\MovieGenre;
use Illuminate\Database\Seeder;

class MovieGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            ['name' => 'Action'],
            ['name' => 'Adventure'],
            ['name' => 'Animation'],
            ['name' => 'Biography'],
            ['name' => 'Comedy'],
            ['name' => 'Crime'],
            ['name' => 'Drama'],
            ['name' => 'Family'],
            ['name' => 'Fantasy'],
            ['name' => 'History'],
            ['name' => 'Horror'],
            ['name' => 'Music'],
            ['name' => 'Musical'],
            ['name' => 'Mystery'],
            ['name' => 'Romance'],
            ['name' => 'Sci-Fi'],
            ['name' => 'Sport'],
            ['name' => 'War'],
            ['name' => 'Western'],
            ['name' => 'Thriller'],
            ['name' => 'Others'],
        ];

        MovieGenre::insert($genres);
    }
}
