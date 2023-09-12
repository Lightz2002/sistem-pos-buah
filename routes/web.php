<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartItemsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Livewire\Cart;
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

Route::middleware('auth')->controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->name('users');
    Route::get('/users/create', 'create')->name('users.create');
    Route::post('/users', 'store')->name('users.store');
    Route::get('/users/{user}/edit', 'edit')->name('users.edit');
    Route::put('/users/{user}', 'update')->name('users.update');
    Route::delete('/users/{user}', 'destroy')->name('users.destroy');
});

Route::middleware('auth')->controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products');
    Route::get('/products/create', 'create')->name('products.create');
    Route::post('/products', 'store')->name('products.store');
    Route::get('/products/{product}/edit', 'edit')->name('products.edit');
    Route::put('/products/{product}', 'update')->name('products.update');
    Route::delete('/products/{product}', 'destroy')->name('products.destroy');
});

Route::middleware('auth')->controller(CartItemsController::class)->group(function () {
    Route::get('/cartitems', 'index')->name('cartitems');
    Route::get('/cartitems/create', 'create')->name('cartitems.create');
    Route::post('/cartitems', 'store')->name('cartitems.store');
    // Route::get('/cartitems/{product}/edit', 'edit')->name('cartitems.edit');
    // Route::put('/cartitems/{product}', 'update')->name('cartitems.update');
    Route::delete('/cartitems/{item}', 'destroy')->name('cartitems.destroy');
});



Route::middleware('auth')->group(function () {
    Route::get('/cartitems', Cart::class)->name('cartitems');
});
require __DIR__.'/auth.php';
