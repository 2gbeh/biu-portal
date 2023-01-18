<?php

use App\Http\Controllers\User\Applicant\AuthenticatedSessionController;
use App\Http\Controllers\User\Applicant\NewPasswordController;
use App\Http\Controllers\User\Applicant\PasswordResetLinkController;
use App\Http\Controllers\User\Applicant\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user/applicant/', 'name' => 'user.applicant.'], function () {
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

        Route::get('dashboard', App\Http\Controllers\User\Applicant\DashboardController::class)->name('dashboard');
        Route::get('help', App\Http\Controllers\HelpController::class)->name('help');
        Route::get('alumni', App\Http\Controllers\User\Applicant\AlumniController::class)->name('alumni');
        
        Route::resource('noticeboard', App\Http\Controllers\User\Applicant\NoticeboardController::class);
        Route::resource('profile', App\Http\Controllers\ProfileController::class);
        Route::resource('profile-change-password', App\Http\Controllers\ProfileChangePasswordController::class);
        Route::resource('profile-change-photo', App\Http\Controllers\ProfileChangePhotoController::class);
        
        Route::resource('apply', App\Http\Controllers\User\Applicant\ApplyController::class);
        Route::resource('apply-exam', App\Http\Controllers\User\Applicant\ApplyExamController::class);

        Route::resource('payment-invoice', App\Http\Controllers\User\Applicant\PaymentInvoiceController::class);
        Route::resource('payment-transactions', App\Http\Controllers\User\Applicant\PaymentTransactionController::class);
    });
});
