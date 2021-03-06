<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;

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

Route::get('/', [FrontController::class, 'index']);
Route::get('/sales', [FrontController::class, 'sales']);
Route::get('/category/{id}', [FrontController::class, 'showProductByCategory'])->where(['id' => '[0-9]+']);
Route::get('product/{id}', [FrontController::class, 'show'])->where(['id' => '[0-9]+']);

Route::resource('/admin/products', ProductController::class)->middleware('auth');
Route::resource('/admin/categories', CategoryController::class)->middleware('auth')->except(['show']);

/*Service */
Route::get('img/{path}', [ImageController::class, 'show'])->where('path', '.*');

/*Auth*/
Auth::routes();

Route::get('/admin', [ProductController::class, 'index'])->name('home')->middleware('auth');
