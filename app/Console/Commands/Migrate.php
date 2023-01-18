<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use FormatHelper;


class Migrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // Ex. `php artisan my:migrate PaymentsTables|CreatePaymentsTables --s=PaymentSeeder`
    protected $signature = 'my:migrate {migration : The migration class name or suffix} {--s= : The seeder class name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rollback, migrate and seed (optional) database table';

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
        $arg = $this->argument('migration');
        $opt = $this->option('s');

        $arg_f = FormatHelper::asMigrationFile($arg);
        $path  = database_path('migrations');
        foreach (scandir($path) as $file) {
            if (strpos($file, $arg_f) !== false) {
                Artisan::call("migrate:rollback --path=/database/migrations/{$file}");
                Artisan::call("migrate --path=/database/migrations/{$file}");
            }
        }
        $this->info("Table migrated successfully.");

        if (isset($opt)) {
            Artisan::call("db:seed --class={$opt}");
            $this->info("Table seeded successfully.");
        }
    }
}
