<?php

namespace App\Console\Commands\Installation;

use Artisan;
use Illuminate\Console\Command;

class InstallProd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:prod';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Artisan::call('db:seed --class=ProdDatabaseSeeder');
        Artisan::call('admin:import helpers');
        Artisan::call('admin:import media-manager');
        Artisan::call('storage:link');
        return;
    }
}
