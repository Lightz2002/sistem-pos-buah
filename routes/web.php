<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Livewire\Cart;
use App\Livewire\CreatePayment;
use App\Livewire\Dashboard;
use App\Livewire\ListOrder;
use App\Livewire\ShowOrder;
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

Route::get('/dashboard', Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');


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

Route::middleware('auth')->group(function () {
    Route::get('/cartitems', Cart::class)->name('cartitems');
});

Route::middleware('auth')->group(function () {
    Route::get('/payments/create', CreatePayment::class)->name('payments.create');
});

Route::middleware('auth')->group(function () {
    Route::get('/orders', ListOrder::class)->name('orders');
    Route::get('/orders/{order}', ShowOrder::class)->name('orders.show');
    Route::post('/orders/{order}/status', [OrderController::class, 'changeStatus'])->name('orders.changeStatus');
});


require __DIR__.'/auth.php';
