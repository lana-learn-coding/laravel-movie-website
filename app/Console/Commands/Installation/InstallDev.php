<?php

namespace App\Console\Commands\Installation;

use Artisan;
use Illuminate\Console\Command;

class InstallDev extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:dev';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup DB and plugins for dev';

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
        Artisan::call('admin:install');
        Artisan::call('db:seed');
        Artisan::call('admin:import helpers');
        Artisan::call('admin:import media-manager');
        Artisan::call('storage:link');
        return;
    }
}
