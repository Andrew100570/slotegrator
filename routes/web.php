<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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

Route::get('/products', [ProductsController::class, 'index'])->name('get_products');
Route::post('/products',[ProductsController::class, 'add'])->name('post_products');

//Route::get('/izbrannoe', [ProductsController::class, 'view_izbrannoe'])->middleware('auth')->name('get_izbrannoe');
Route::get('/izbrannoe', [ProductsController::class, 'view_izbrannoe'])->name('get_izbrannoe');
//Route::post('/izbrannoe',[ProductsController::class, 'add_izbrannoe'])->middleware('auth')->name('post_izbrannoe');
Route::post('/izbrannoe',[ProductsController::class, 'add_izbrannoe'])->name('post_izbrannoe');
Route::get('/search',[ProductsController::class, 'search'])->name('search');
