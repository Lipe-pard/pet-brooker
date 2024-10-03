<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])
    ->as('admin.')
    ->group(function () {
        Route::view('dashboard', 'page.admin.dashboard')
            ->name('dashboard');
    });

Route::middleware(['auth', 'verified'])
    ->as('client.')
    ->group(function () {
        Route::view('dashboard', 'pages.client.dashboard')
            ->name('dashboard');
    });




Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
