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
        $categories = [
            ['name' => 'Series'],
            ['name' => 'Documentary'],
            ['name' => 'Film'],
            ['name' => 'Others'],
        ];

        MovieCategory::insert($categories);
    }
}
