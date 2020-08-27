<?php

namespace App\Console\Commands\Compress;

use App\Models\Movie\MovieView;
use Illuminate\Console\Command;

class CompressViewCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'compress:view-count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'compress view counts in to daily view counts';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $views = MovieView::today()->get()->groupBy('movie_id');
        foreach ($views as $movieViews) {
            if ($movieViews->isEmpty()) {
                continue;
            }
            $movie = $movieViews[0]->movie;
            $date = $movieViews[0]->date;

            $movie->views()->create([
                'date' => $date,
                'count' => $movieViews->sum('count')
            ])->save();

            MovieView::whereIn('id', $movieViews->pluck('movie_id'))->delete();
        }
    }
}
