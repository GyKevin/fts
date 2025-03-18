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
    
// admin dashboard
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/festivals', [AdminController::class, 'festivals'])->name('admin.festivals');
Route::get('/admin/busses', [AdminController::class, 'busses'])->name('admin.busses');

//admin edit folder
Route::get('/admin/festivals/{festival}/edit', [AdminController::class, 'editFestival'])->name('admin.edit.festivals');
Route::put('/admin/festivals/{festival}', [AdminController::class, 'updateFestival'])->name('admin.update.festivals');
Route::delete('/admin/festivals/{festival}', [AdminController::class, 'deleteFestival'])->name('admin.delete.festivals');
Route::post('/admin/festivals', [AdminController::class, 'storeFestival'])->name('admin.store.festivals');

// admin add folder
Route::get('/admin/add/festivals', function () { return view('admin.add.festivals');})->name('admin.add.festivals');
require __DIR__.'/auth.php';

Route::get('/admin/add/busses', function () { return view('admin.add.busses');})->name('admin.add.busses');
require __DIR__.'/auth.php';
Route::post('/admin/busses', [AdminController::class, 'storeBus'])->name('admin.store.busses');
Route::get('/admin/add/busses', [AdminController::class, 'addBus'])->name('admin.add.busses');