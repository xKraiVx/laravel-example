<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Demo\DemoController;


Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::get('/about', function () {
    return Inertia::render('about');
})->name('about');

Route::middleware('CheckAge')->group(function () {
    Route::controller(DemoController::class)->group(function () {
        Route::get('/demo', 'Index')->name('demo');
        Route::get('/contact', 'ContactMethod')->name('contact');
    });
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
