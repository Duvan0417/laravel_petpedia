<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\OrderController;

Route::get('categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::put('category/{category}',[CategoryController::class,'update'])->name('category.update');
Route::delete('category/{category}',[CategoryController::class,'destroy'])->name('category.destroy');
Route::get('curso/{category}/editar',[CategoryController::class,'edit'])->name('category.edit');

// Rutas para Productos
// Rutas para Productos (versión corregida)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');  // Cambiado de 'product/store'
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');  // Cambiado de 'editar'
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

// Rutas para Inventory (plural en URLs, singular en nombres)
Route::get('/inventories', [InventoryController::class, 'index'])->name('inventory.index');
Route::get('/inventories/create', [InventoryController::class, 'create'])->name('inventory.create');
Route::post('/inventories', [InventoryController::class, 'store'])->name('inventory.store');
Route::get('/inventories/{inventory}', [InventoryController::class, 'show'])->name('inventory.show');
Route::get('/inventories/{inventory}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');
Route::put('/inventories/{inventory}', [InventoryController::class, 'update'])->name('inventory.update');
Route::delete('/inventories/{inventory}', [InventoryController::class, 'destroy'])->name('inventory.destroy');



// Rutas individuales corregidas
Route::get('/shoppingcart', [ShoppingCartController::class, 'index'])->name('shoppingcart.index');
Route::get('/shoppingcart/create', [ShoppingCartController::class, 'create'])->name('shoppingcart.create');
Route::post('/shoppingcart', [ShoppingCartController::class, 'store'])->name('shoppingcart.store');
Route::get('/shoppingcart/{shoppingcart}', [ShoppingCartController::class, 'show'])->name('shoppingcart.show');
Route::get('/shoppingcart/{shoppingcart}/edit', [ShoppingCartController::class, 'edit'])->name('shoppingcart.edit');
Route::put('/shoppingcart/{shoppingcart}', [ShoppingCartController::class, 'update'])->name('shoppingcart.update'); // Corregido el nombre
Route::delete('/shoppingcart/{shoppingcart}', [ShoppingCartController::class, 'destroy'])->name('shoppingcart.destroy');

// Rutas individuales
Route::get('/order_items', [OrderItemController::class, 'index'])->name('order_items.index');
Route::get('/order_items/create', [OrderItemController::class, 'create'])->name('order_items.create');
Route::post('/order_items', [OrderItemController::class, 'store'])->name('order_items.store');
Route::get('/order_items/{order_item}', [OrderItemController::class, 'show'])->name('order_items.show');
Route::get('/order_items/{order_item}/edit', [OrderItemController::class, 'edit'])->name('order_items.edit');
Route::put('/order_items/{order_item}', [OrderItemController::class, 'update'])->name('order_items.update');
Route::delete('/order_items/{order_item}', [OrderItemController::class, 'destroy'])->name('order_items.destroy');




// Rutas para Orders (Pedidos)
Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/{order}', [OrderController::class, 'show'])->name('order.show');
Route::get('/order/{order}/edit', [OrderController::class, 'edit'])->name('order.edit');
Route::put('/order/{order}', [OrderController::class, 'update'])->name('order.update');
Route::delete('/order/{order}', [OrderController::class, 'destroy'])->name('order.destroy');