<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Demo\DemoController;
use App\Mail\MyTestMail;


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

Route::get('test-email', function () {
   $name = 'John Doe';

   var_dump($name);
   var_dump("TEST TEST WEB");

   Mail::to('test@test.com')->send(new MyTestMail($name));
   return "Email sent successfully!";
})->name('test-email');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
