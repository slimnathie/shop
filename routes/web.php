<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
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

Route::get('/', function () {
    return redirect('login');
});

Route::get('/market', [ProductsController::class, 'index'], function () {
})->middleware(['auth', 'verified'])->name('market');

Route::get('add_to_cart/{id}', [ProductsController::class, 'addToCart'])->name('add_to_cart');

Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::delete('remove-from-cart', [ProductsController::class, 'remove'])->name('remove_from_cart');

Route::patch('update_item_quantity', [ProductsController::class, 'update'])->name('update_item_quantity');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
