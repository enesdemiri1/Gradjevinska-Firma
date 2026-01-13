<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('kupacs', App\Http\Controllers\KupacController::class);
    Route::resource('fakturas', App\Http\Controllers\FakturaController::class);
    Route::resource('dobavljacs', App\Http\Controllers\DobavljacController::class);
    Route::resource('robas', App\Http\Controllers\RobaController::class);
});

require __DIR__.'/auth.php';
