<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// use App\Http\Middleware\CheckRole;
#Import this ↑↑ if using normal format


#normal format of using middleware
// Route::get('/', function () {
//     return view('welcome');
// })->middleware(CheckRole::class);

#Using Aliases for middleware
Route::get('/', function () {
    return view('welcome');
});

Route::get('/userPage', function () {
    return view('userPage');
})->middleware('is_admin:admin');
#use middleware('auth','is_admin'); to redirect unauthorize users


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
