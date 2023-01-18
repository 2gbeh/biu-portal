<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

#! In order to use the Auth::routes() method, please install the laravel/ui package.
Auth::routes([
'register' =>  false
]);

 */

Route::get('/', App\Http\Controllers\WelcomeController::class);

# AUTHENTICATION ROUTES
include_once __DIR__ . '/auth.php';

# ADMIN ROUTES
include_once __DIR__ . '/route/admin.php';

# USER-APPLICANT ROUTES
include_once __DIR__ . '/route/applicant.php';

# USER-STUDENT ROUTES
include_once __DIR__ . '/route/student.php';

# SERVERLESS
Route::get('/ping', function () {
    dd($_SERVER);
});

Route::get('/phpinfo', function () {
    dd(phpinfo());
});

Route::get('/webmaster', function () {
    return redirect()->away(env('WEB_MASTER'));
});

Route::get('/dev', function () {
    $new = new Database\Seeders\PaymentSeeder();

    dd(
        $new->run()
    );
});
