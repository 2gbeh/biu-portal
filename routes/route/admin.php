<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin/', 'name' => 'admin.'], function () {

    Route::middleware('auth')->group(function () {

        Route::get('dashboard', App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');
        Route::get('settings', App\Http\Controllers\Admin\SettingController::class)->name('settings');
        Route::get('help', App\Http\Controllers\HelpController::class)->name('help');
        Route::get('search', App\Http\Controllers\Admin\SearchController::class)->name('search');

        Route::resource('noticeboard', App\Http\Controllers\Admin\NoticeboardController::class);
        Route::resource('profile', App\Http\Controllers\ProfileController::class);
        Route::resource('profile-change-password', App\Http\Controllers\ProfileChangePasswordController::class);
        Route::resource('profile-change-photo', App\Http\Controllers\ProfileChangePhotoController::class);

        Route::resource('wifi', App\Http\Controllers\Admin\WifiController::class);
        Route::resource('users', App\Http\Controllers\Admin\UserController::class);
        Route::resource('user-logs', App\Http\Controllers\Admin\UserLogController::class);
        Route::resource('user-roles', App\Http\Controllers\Admin\UserRoleController::class);

        Route::resource('privilege-policies', App\Http\Controllers\Admin\PrivilegePolicyController::class);
        Route::resource('privilege-gates', App\Http\Controllers\Admin\PrivilegeGateController::class);
        Route::resource('privilege-roles', App\Http\Controllers\Admin\PrivilegeRoleController::class);
        Route::resource('privilege-permissions', App\Http\Controllers\Admin\PrivilegePermissionController::class);

        Route::resource('list-sessions', App\Http\Controllers\Admin\ListSessionController::class);
        Route::resource('list-programmes', App\Http\Controllers\Admin\ListProgrammeController::class);
        Route::resource('list-faculties', App\Http\Controllers\Admin\ListFacultyController::class);
        Route::resource('list-departments', App\Http\Controllers\Admin\ListDepartmentController::class);
        Route::resource('list-units', App\Http\Controllers\Admin\ListUnitController::class);
        Route::resource('list-levels', App\Http\Controllers\Admin\ListLevelController::class);

        Route::resource('map-sessions-to-programmes', App\Http\Controllers\Admin\MapSessionsToProgrammeController::class);
        Route::resource('map-departments-to-faculties', App\Http\Controllers\Admin\MapDepartmentsToFacultyController::class);
        Route::resource('map-units-to-departments', App\Http\Controllers\Admin\MapUnitsToDepartmentController::class);
        Route::resource('map-units-to-programmes', App\Http\Controllers\Admin\MapUnitsToProgrammeController::class);

        Route::resource('entity-applicants', App\Http\Controllers\Admin\EntityApplicantController::class);

        Route::resource('payment-gateways', App\Http\Controllers\Admin\PaymentGatewayController::class);
        Route::resource('payment-invoices', App\Http\Controllers\Admin\PaymentInvoiceController::class);
        Route::resource('payment-transactions', App\Http\Controllers\Admin\PaymentTransactionController::class);
        
        Route::resource('courses', App\Http\Controllers\Admin\CourseController::class);


        // Route::group([
        //     'controller' => 'App\Http\Controllers\Admin\UserLogController',
        //     'prefix' => 'ologs/',
        //     'name' => 'ologs.',
        // ], function () {
        //     Route::get('', 'index')->name('index');
        //     Route::get('{slug}', 'show')->name('show');
        // });

        // Route::get('noticeboard', App\Http\Controllers\Admin\NoticeboardController::class);
        // Route::resource('profile', App\Http\Controllers\Admin\UserProfileController::class);
        // Route::resource('wifi', App\Http\Controllers\Admin\WifiController::class);
    });
});
