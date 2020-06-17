<?php

use App\Models\Movie\MovieLanguage;
use Illuminate\Database\Seeder;

class MovieLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MovieLanguage::class, 4)->create();
    }
}
