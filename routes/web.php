<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/', [NewsController::class, 'index']);

Route::get('/dashboard', [NewsController::class, 'index']);

Route::resource('news', NewsController::class, ['only' => ['index', 'show']]);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('news/{id}')->group(function() {
        Route::post('favorites', [FavoritesController::class, 'store'])->name('favorites.favorite');
        Route::delete('unfavorite', [FavoritesController::class, 'destroy'])->name('favorites.unfavorite');
        
        Route::post('comments', [CommentsController::class, 'store'])->name('comments.store');
    });

    Route::prefix('users/{id}')->group(function () {
        Route::get('favorites', [UsersController::class, 'favorites'])->name('users.favorites');
    });

    Route::delete('/comments/{id}', [CommentsController::class, 'destroy'])->name('comments.destroy');

    Route::resource('users', UsersController::class, ['only' => ['index', 'show']]);

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
