<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
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
    return view('layout.app');
});
Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::post('products', [ProductController::class, 'store'])->name('products.store');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('products/{id}/delete', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

Route::get('tags', [TagController::class, 'index'])->name('tags.index');
Route::post('tags', [TagController::class, 'store'])->name('tags.store');
Route::get('tags/create', [TagController::class, 'create'])->name('tags.create');
Route::put('tags/{id}', [TagController::class, 'update'])->name('tags.update');
Route::get('tags/{id}/delete', [TagController::class, 'destroy'])->name('tags.destroy');
Route::get('tags/{id}/edit', [TagController::class, 'edit'])->name('tags.edit');
