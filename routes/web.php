<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CircuitsController;
use Illuminate\Support\Facades\Auth;

// Route for the welcome page
Route::get('/', function () {
    return view('welcome');
});

// Route for the dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication routes
require __DIR__.'/auth.php';

// Default home route for authenticated users
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Circuits routes
Route::middleware(['auth'])->group(function () {
    Route::get('/circuits', [CircuitsController::class, 'index'])->name('circuits.index');
    Route::get('/circuits/list', [CircuitsController::class, 'list'])->name('circuits.list');
    Route::get('/circuits/create', [CircuitsController::class, 'create'])->name('circuits.create');
    Route::post('/circuits', [CircuitsController::class, 'store'])->name('circuits.store');
    Route::get('/circuits/{id}/edit', [CircuitsController::class, 'edit'])->name('circuits.edit');
    Route::put('/circuits/{id}', [CircuitsController::class, 'update'])->name('circuits.update');
    Route::delete('/circuits/{id}', [CircuitsController::class, 'destroy'])->name('circuits.destroy');
});

Route::get('/livewire/livewire.js', function () {
    echo 'Works';
});

