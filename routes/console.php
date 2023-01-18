<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
 */

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('my', function () {
    $thead = ['Command', 'Summary', 'Example'];
    $tbody = [[
        'cmd' => 'Migrate',
        'desc' => 'Rollback, migrate and seed (optional) database table',
        'ex' => 'my:migrate PaymentsTables|CreatePaymentsTables --s=PaymentSeeder',
    ], [
        'cmd' => 'Seed',
        'desc' => 'Truncate and seed database table',
        'ex' => 'my:seed PaymentSeeder --t=payment_gateways --t=payment_invoices --t=payment_transactions',
    ], [
        'cmd' => 'Reset',
        'desc' => 'Truncate and seed database tables',
        'ex' => 'my:reset --k=User',
    ], [
        'cmd' => 'Clear',
        'desc' => 'Clear all caches, truncate laravel.log and run composer dump-autoload (optional)',
        'ex' => 'my:clear -d',
    ]];

    $this->table($thead, $tbody);
})->purpose('List my custom artisan commands');
