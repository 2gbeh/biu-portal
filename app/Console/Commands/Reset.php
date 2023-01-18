<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class Reset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // Ex. `php artisan my:reset --k=User`
    protected $signature = 'my:reset {--k=User : The reset option key - seeder class name prefix}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncate and seed database tables';

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
        $t = [];
        $s = null;

        switch ($this->option('k')) {
            case 'User':
                $t = ['users', 'user_roles', 'user_logs'];
                break;
            default:
                break;
        }

        foreach ($t as $table) {
            DB::table($table)->truncate();
        }
        $this->info("Tables truncated successfully.");

        Artisan::call("db:seed --class={$s}Seeder");
        $this->info("Tables seeded successfully.");
    }
}
