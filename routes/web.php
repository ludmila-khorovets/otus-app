<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');

Route::controller(HallController::class)->group(function () {
    Route::get('/halls', 'index')->name('halls');
    Route::get('/halls/{id}', 'show')->name('halls.show');
});

Route::controller(BookingController::class)->group(function () {
    Route::get('/book', 'index')->name('book');
    Route::post('/book', 'store')->name('book.store');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');

Route::get('/register', function () {
    return view('auth.register');
})->name('auth.register');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
