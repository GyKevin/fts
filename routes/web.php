<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('festival', FestivalController::class);
Route::post('/festivals/{festival}/book', [FestivalController::class, 'book'])->name('festival.book');
Route::post('/festivals/{festival}/payment', [FestivalController::class, 'payment'])
    ->name('festival.payment');
Route::get('/myfestivals', [FestivalController::class, 'myFestivals'])
    ->name('festival.myFestivals')
    ->middleware('auth');
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });

require __DIR__.'/auth.php';
