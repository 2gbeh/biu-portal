<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class Seed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // Ex. `php artisan my:seed PaymentSeeder --t=payment_gateways --t=payment_invoices --t=payment_transactions`
    protected $signature = 'my:seed {seeder : The seeder class name} {--t=* : The table names to truncate}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncate and seed database table';

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
        $arg = $this->argument('seeder');
        $opts = $this->option('t');

        foreach ($opts as $opt) {
            DB::table($opt)->truncate();
            $this->info("Table truncated successfully.");
        }

        Artisan::call("db:seed --class={$arg}");

        $this->info("Table seeded successfully.");
    }
}
