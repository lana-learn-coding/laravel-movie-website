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
        $languages = [
            ['name' => 'Vietnamese'],
            ['name' => 'English'],
            ['name' => 'Vietnamese subtitles'],
            ['name' => 'English subtitles'],
            ['name' => 'Others']
        ];

        MovieLanguage::insert($languages);
    }
}
