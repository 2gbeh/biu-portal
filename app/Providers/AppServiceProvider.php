<?php

namespace App\Providers;

use App\Traits\RouteTrait;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use BladeHelper;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 1000 bytes (SQL: alter table `users` add unique `users_email_unique`(`email`))
        Schema::defaultStringLength(191);

        // Bootstrap Pagination
        Paginator::useBootstrap();

        //
        View::share('ctx', (object) config('context'));

        View::share('url', RouteTrait::class);

        View::share('f', BladeHelper::class);

        Blade::directive('out', function ($args) {
            return "<?= $args ?>";
        });

        Blade::directive('i', function ($args) {
            return "<?= '<i class=\"'.$args.'\"></i>' ?>";
        });

        Blade::directive('br', function ($args) {
            return "<?= $args.'<br/>' ?>";
        });

        Blade::directive('hr', function ($args) {
            return "<?= $args.'<hr/>' ?>";
        });
        Blade::directive('p', function ($args) {
            return "<?= '<p>'.$args.'</p>' ?>";
        });

        Blade::directive('li', function ($args) {
            return "<?= '<li>'.$args.'</li>' ?>";
        });

        Blade::directive('th', function ($args) {
            return "<?= '<th>'.$args.'</th>' ?>";
        });

        Blade::directive('td', function ($args) {
            return "<?= '<td>'.$args.'</td>' ?>";
        });

        Blade::directive('pre', function ($args) {
            return "<?php echo '<pre>'; print_r($args); echo '</pre>'; ?>";
        });

        Blade::directive('vd', function ($args) {
            return "<?php echo '<pre>'; var_dump($args); echo '</pre>'; ?>";
        });

        Blade::directive('naira', function ($args) {
            return "<?= '&#8358;' ?>";
        });

        //
        View::share('portal', RouteTrait::pageTitle());

    }
}
