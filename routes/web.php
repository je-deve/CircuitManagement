<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CircuitsController;
use App\Http\Controllers\EventsController;

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
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/circuits', [CircuitsController::class, 'index'])->name('circuits.index');
    Route::get('/circuits/list', [CircuitsController::class, 'list'])->name('circuits.list');
    Route::get('/circuits/create', [CircuitsController::class, 'create'])->name('circuits.create');
    Route::post('/circuits', [CircuitsController::class, 'store'])->name('circuits.store');
    Route::get('/circuits/{id}/edit', [CircuitsController::class, 'edit'])->name('circuits.edit');
    Route::put('/circuits/{id}', [CircuitsController::class, 'update'])->name('circuits.update');
    Route::delete('/circuits/{id}', [CircuitsController::class, 'destroy'])->name('circuits.destroy');
    Route::get('circuits/{id}', [CircuitsController::class, 'show'])->name('circuits.show');
    Route::post('circuits/{id}/update-status', [CircuitsController::class, 'updateStatus'])->name('circuits.updateStatus');


});

Route::resource('events', EventsController::class);
