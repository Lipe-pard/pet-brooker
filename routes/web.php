<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('admin')->as('admin.')->group( function () {
        Route::view('dashboard', 'pages.admin.dashboard')
            ->name('dashboard');
    });
    Route::prefix('client')->as('client.')->group( function () {
        Route::view('dashboard', 'pages.client.dashboard')
            ->name('dashboard');
    });
});




Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
