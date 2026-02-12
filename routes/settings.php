<?php

use App\Http\Controllers\Settings\AppearanceController;
use App\Http\Controllers\Settings\PasswordController;
use App\Http\Controllers\Settings\ProfileController;

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', '/settings/profile');

    Route::get('settings/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('settings/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::patch('/appearance', [AppearanceController::class, 'update'])->name('appearance.update');

    Route::middleware(['verified'])->group(function () {

        Route::delete('settings/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('settings/password', [PasswordController::class, 'edit'])->name('user-password.edit');

        Route::put('settings/password', [PasswordController::class, 'update'])
            ->middleware('throttle:change-password')
            ->name('user-password.update');

    });

});
