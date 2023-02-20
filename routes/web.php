<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::view('admin','livewire.admin');
// Route::view('user','livewire.user');
 Route::view('roles', 'livewire.home');
Route::view('employes', 'livewire.admin');
Route::view('profile', 'livewire.profile');
Route::view('products', 'livewire.items');
Route::view('deliveryboys', 'livewire.deliveryboys');
Route::view('manager', 'livewire.manager');
Route::view('storemanager', 'livewire.storemanager');
Route::view('staff', 'livewire.staff');
Route::view('menu', 'livewire.user');
Route::view('logout', 'livewire.logout');