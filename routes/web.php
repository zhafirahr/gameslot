<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/home', function () {
    // Redirect to the home page if the user is authenticated
    if (Auth::check()) {
        return redirect('/');
    }
    else {
        return redirect('/login');
    }
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/games/{id}', [GameController::class, 'show'])->name('games.show');
Route::get('/games/{id}/cart', [GameController::class, 'cart'])->name('games.add_to_cart');

// Route group middleware logged in only
Route::group([
    'middleware' => 'auth',
], function () {
    Route::get('/profile', [UserController::class, 'index'])->name('user.profile');
    Route::post('/profile', [UserController::class, 'update'])->name('user.profile');

    Route::get('/cart', [TransactionController::class, 'cart'])->name('user.cart');
    Route::put('/cart/{id}', [TransactionController::class, 'edit_cart'])->name('user.cart.edit');
    Route::delete('/cart/{id}', [TransactionController::class, 'delete_cart'])->name('user.cart.delete');
    Route::get('/cart/checkout', [TransactionController::class, 'store'])->name('user.cart.checkout');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('user.transaction');
    Route::get('/transaction/{id}', [TransactionController::class, 'show'])->name('user.transaction.detail');
});

// Admin routes
Route::group([
    'middleware' => ['auth', 'admin'],
], function () {
    Route::get('/manage-game', [GameController::class, 'manageGame'])->name('manage.game');
    Route::get('/manage-game/create', [GameController::class, 'create'])->name('manage.game.create');
    Route::post('/manage-game/create', [GameController::class, 'store'])->name('manage.game.create');
    Route::get('/manage-game/{id}/edit', [GameController::class, 'edit'])->name('manage.game.edit');
    Route::post('/manage-game/{id}/edit', [GameController::class, 'update'])->name('manage.game.edit');
    Route::delete('/manage-game/{id}/delete', [GameController::class, 'destroy'])->name('manage.game.delete');
    Route::get('/manage-game-genre', [GameController::class, 'manageGameGenre'])->name('manage.game.genre');
    Route::get('/manage-game-genre/{id}', [GameController::class, 'editGameGenre'])->name('manage.game.genre.edit');
    Route::post('/manage-game-genre/{id}', [GameController::class, 'updateGameGenre'])->name('manage.game.genre.edit');
});
