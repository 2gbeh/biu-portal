<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Clear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // Ex. `php artisan my:clear -d`
    protected $signature = 'my:clear {--d|dump : Execute composer dump-autoload}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all caches, truncate laravel.log and run composer dump-autoload (optional)';

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
     * @return int
     */
    public function handle()
    {
        Artisan::call("optimize:clear");
        $this->info("Caches cleared successfully!");

        exec('echo # > storage/logs/laravel.log');
        $this->info("./storage/logs/laravel.log truncated!");

        if ($this->option('dump')) {
            Artisan::call("key:generate");

            exec('composer dump-autoload');
            exec('composer clear-cache');
            exec('composer clear-cache');
        }
    }
}
