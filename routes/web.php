<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\ReportsController;

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

// Route::get('/student', function () {
//     return view('student');
// });

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/customers', CustomerController::class);
Route::resource('/products', ProductController::class);

Route::get('customers', [App\Http\Controllers\CustomerController::class,'index']);

Route::resource('/menus', MenuController::class);

// Route::get('/menus/{id}', [App\Http\Controllers\MenuController::class,'index']);
// Route::get('/order/{id}', [CustomerController::class, 'showData']);

//Route::get('/cart/{id}', [MenuController::class, 'index']);

Route::get('/cart/{id}', [MenuController::class, 'data']);

// Route::resource('/cart', OrderController::class);

Route::get('cart', [App\Http\Controllers\OrderController::class,'index']);
Route::post('cart', [App\Http\Controllers\OrderController::class,'store']);
Route::get('orders', [App\Http\Controllers\OrderController::class,'list']);
Route::get('/status/{id}', [App\Http\Controllers\OrderController::class, 'status']);

Route::get('/order/{id}', [App\Http\Controllers\OrderController::class,'orders']);

Route::delete('/order/{id}', [App\Http\Controllers\OrderController::class,'destroy']);
Route::post('/quantity/update', [App\Http\Controllers\OrderController::class, 'updateQuantity'])->name('update.quantity');

Route::get('customers-edit/{id}', [CustomerController::class, 'edit']);
Route::put('customers/{id}', [CustomerController::class, 'update']);

Route::get('products-edit/{id}', [ProductController::class, 'edit']);
Route::put('products/{id}', [ProductController::class, 'update']);

Route::get('/kitchen', [App\Http\Controllers\KitchenController::class,'index']);

// Route::get('order', [App\Http\Controllers\ReportsController::class,'index']);
// Route::post('cart', [App\Http\Controllers\ReportsController::class,'store']);


//Route::get('navigation', [App\Http\Controllers\OrderController::class,'count']);

require __DIR__.'/auth.php';
