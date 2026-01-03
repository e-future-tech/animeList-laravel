<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\Favoritecontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;

Route::get('/', [ContentController::class, "home"])->name('home');
Route::get('/detail/{mal_id}', [ContentController::class, "detail"]);
Route::get('/top', [ContentController::class, "top"]);
Route::get('/top/upcoming', [ContentController::class, "topUpcoming"]);
Route::get('/recommendations/{mal_id}/{name}', [ContentController::class, "recommendations"]);
Route::get('/seasons', [ContentController::class, "seasonYears"]);
Route::get('/seasons/{year}/{season}', [ContentController::class, "seasonAnime"]);
Route::get('/search', [ContentController::class, "search"]);

Route::get('/about', function () {
    return view('about', ['title' => "About Me."]);
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/users', [AdminController::class, 'users'])->name('users');
    Route::get('/admin/user/{uid}', [AdminController::class, 'editUser']);
    Route::post('/admin/user/update', [AdminController::class, 'updateUser'])->name('force.update.user');
    Route::get('/admin/user/delete/{uid}', [AdminController::class, 'deleteUser']);
});

Route::middleware('auth')->group(function () {
    Route::get('/favorites', [Favoritecontroller::class, 'index']);

    Route::get('/wishlists', [WishlistController::class, 'index']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
