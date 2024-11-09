<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Product Routes


Route::get('/', [ProductController::class, 'index'])->name('products.index');   
Route::get('/products', [ProductController::class, 'index'])->name('products.index');         // List all products
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); // Show form to create a new product
Route::post('/products', [ProductController::class, 'store'])->name('products.store');         // Store a new product
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');       // Show a specific product
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');  // Show form to edit a product
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');   // Update a product
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy'); // Delete a product
