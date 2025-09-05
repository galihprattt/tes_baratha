<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Barang: bisa admin dan operator
    Route::middleware('role:admin,operator')->group(function () {
        Route::resource('items', ItemController::class);
        Route::resource('transactions', TransactionController::class)->except(['show']);
    });

    // Admin: manage users
    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class)->except(['show']);
    });

    //profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //dummy tes role
    Route::middleware('role:admin')->get('/admin-only', function () {
        return 'Halo Admin!';
    });
    Route::middleware('role:operator,admin')->get('/operator-or-admin', function () {
        return 'Halo Operator/Admin!';
    });
});


require __DIR__.'/auth.php';
