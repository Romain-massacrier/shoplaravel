<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('products.index');

Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::resource('products', ProductController::class);