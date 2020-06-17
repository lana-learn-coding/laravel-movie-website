<?php

use App\Models\Movie\MovieCategory;
use Illuminate\Database\Seeder;

class MovieCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MovieCategory::class, 5)->create();
    }
}
