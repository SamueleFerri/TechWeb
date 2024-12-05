<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome1');
});

Route::get('/albums', function () {
    return view('albums');
});

Route::get('/courses', function () {
    return view('courses');
});

Route::get('/abaut', function () {
    return view('abaut');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/bag', function () {
    return view('bag');
});

Route::get('/likes', function () {
    return view('likes');
});

Route::get('/gadgets', function () {
    return view('gadgets');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);
