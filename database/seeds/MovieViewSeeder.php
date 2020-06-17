<?php

use App\Models\Movie\MovieView;
use Illuminate\Database\Seeder;

class MovieViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MovieView::class, 8000)->create();
    }
}
