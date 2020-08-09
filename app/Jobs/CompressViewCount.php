<?php

namespace App\Jobs;

use App\Models\Movie\MovieView;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CompressViewCount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
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
