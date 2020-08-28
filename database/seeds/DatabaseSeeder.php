<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MovieCategorySeeder::class,
            MovieGenreSeeder::class,
            MovieLanguageSeeder::class,
            MovieNationSeeder::class,
            CastSeeder::class,
            MovieSeeder::class,
            MovieViewSeeder::class,
            AdminMenuSeeder::class
        ]);
    }
}
