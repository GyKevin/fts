<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// route to images folder storage/public/img
Route::get('/img/{filename}', function ($filename) {
    $path = storage_path('storage/public/img/' . $filename);
    if (!file_exists($path)) {
        abort(404);
    }
    return response()->file($path);
});

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

// Edit and delete data
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/festivals', [AdminController::class, 'festivals'])->name('admin.festivals');
Route::get('/admin/busses', [AdminController::class, 'busses'])->name('admin.busses');
Route::get('/admin/drivers', [AdminController::class, 'drivers'])->name('admin.drivers');

// edit/delete festivals
Route::get('/admin/festivals/{festival}/edit', [AdminController::class, 'editFestival'])->name('admin.edit.festivals');
Route::put('/admin/festivals/{festival}', [AdminController::class, 'updateFestival'])->name('admin.update.festivals');
Route::delete('/admin/festivals/{festival}', [AdminController::class, 'deleteFestival'])->name('admin.delete.festivals');

// edit/delete users
Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.edit.users');
Route::put('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.update.users');
Route::delete('/admin/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.delete.users');

// edit/delete busses
Route::get('/admin/busses/{bus}/edit', [AdminController::class, 'editBus'])->name('admin.edit.busses');
Route::put('/admin/busses/{bus}', [AdminController::class, 'updateBus'])->name('admin.update.busses');
Route::delete('/admin/busses/{bus}', [AdminController::class, 'deleteBus'])->name('admin.delete.busses');

// edit/delete drivers
Route::get('/admin/drivers/{driver}/edit', [AdminController::class, 'editDriver'])->name('admin.edit.drivers');
Route::put('/admin/drivers/{driver}', [AdminController::class, 'updateDriver'])->name('admin.update.drivers');
Route::delete('/admin/drivers/{driver}', [AdminController::class, 'deleteDriver'])->name('admin.delete.drivers');

// Add data
// Add festivals
Route::post('/admin/festivals', [AdminController::class, 'storeFestival'])->name('admin.store.festivals');
Route::get('/admin/add/festivals', function () { return view('admin.add.festivals');})->name('admin.add.festivals');
require __DIR__.'/auth.php';
// Add busses
Route::get('/admin/add/busses', function () { return view('admin.add.busses');})->name('admin.add.busses');
require __DIR__.'/auth.php';
Route::post('/admin/busses', [AdminController::class, 'storeBus'])->name('admin.store.busses');
Route::get('/admin/add/busses', [AdminController::class, 'addBus'])->name('admin.add.busses');

// Add drivers
Route::get('/admin/add/drivers', function () { return view('admin.add.drivers');})->name('admin.add.drivers');
require __DIR__.'/auth.php';
Route::post('/admin/drivers', [AdminController::class, 'storeDriver'])->name('admin.store.drivers');

// Add users
Route::get('/admin/add/users', function () { return view('admin.add.users');})->name('admin.add.users');
require __DIR__.'/auth.php';
Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.store.users');