<?php

use App\Http\Controllers\User\Student\AuthenticatedSessionController;
use App\Http\Controllers\User\Student\NewPasswordController;
use App\Http\Controllers\User\Student\PasswordResetLinkController;
use App\Http\Controllers\User\Student\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user/student/', 'name' => 'user.student.'], function () {
    Route::middleware('guest')->group(function () {
        Route::get('', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

        Route::post('', [AuthenticatedSessionController::class, 'store'])
            ->name('login.store');

        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store'])
            ->name('login.store');

        Route::get('register', [RegisteredUserController::class, 'create'])
            ->name('register');

        Route::post('register', [RegisteredUserController::class, 'store'])
            ->name('register.store');

        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
            ->name('password.request');

        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
            ->name('password.email');

        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
            ->name('password.reset');

        Route::post('reset-password', [NewPasswordController::class, 'store'])
            ->name('password.update');
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');

        Route::get('dashboard', App\Http\Controllers\User\Student\DashboardController::class)->name('dashboard');

    });
});
