<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchasedItemController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SoldItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Users
Route::delete('/users/{user}', [UserController::class, 'destroy']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users', [UserController::class, 'index']);

//Suppliers
Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy']);
Route::put('/suppliers/{supplier}', [SupplierController::class, 'update']);
Route::get('/suppliers/{supplier}', [SupplierController::class, 'show']);
Route::get('/suppliers', [SupplierController::class, 'index']);
Route::post('/suppliers', [SupplierController::class, 'store']);

// Customers
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy']);
Route::put('/customers/{customer}', [CustomerController::class, 'update']);
Route::get('/customers/{customer}', [CustomerController::class, 'show']);
Route::get('/customers', [CustomerController::class, 'index']);
Route::post('/customers', [CustomerController::class, 'store']);

// Merchandises
Route::delete('/merchandises/{merchandise}', [MerchandiseController::class, 'destroy']);
Route::put('/merchandises/{merchandise}', [MerchandiseController::class, 'update']);
Route::get('/merchandises/{merchandise}', [MerchandiseController::class, 'show']);
Route::get('/merchandises', [MerchandiseController::class, 'index']);
Route::post('/merchandises', [MerchandiseController::class, 'store']);

// Purchases
Route::delete('/purchases/{purchase}', [PurchaseController::class, 'destroy']);
Route::put('/purchases/{purchase}', [PurchaseController::class, 'update']);
Route::get('/purchases/{purchase}', [PurchaseController::class, 'show']);
Route::get('/purchases', [PurchaseController::class, 'index']);
Route::post('/purchases', [PurchaseController::class, 'store']);

// Purchased Items
Route::delete('/purchased_items/{purchased_item}', [PurchasedItemController::class, 'destroy']);
Route::put('/purchased_items/{purchased_item}', [PurchasedItemController::class, 'update']);
Route::get('/purchased_items/{purchased_item}', [PurchasedItemController::class, 'show']);
Route::get('/purchased_items', [PurchasedItemController::class, 'index']);
Route::post('/purchased_items', [PurchasedItemController::class, 'store']);

// Sales
Route::delete('/sales/{sale}', [SaleController::class, 'destroy']);
Route::put('/sales/{sale}', [SaleController::class, 'update']);
Route::get('/sales/{sale}', [SaleController::class, 'show']);
Route::get('/sales', [SaleController::class, 'index']);
Route::post('/sales', [SaleController::class, 'store']);

// Sold Items
Route::delete('/sold_items/{sold_item}', [SoldItemController::class, 'destroy']);
Route::put('/sold_items/{sold_item}', [SoldItemController::class, 'update']);
Route::get('/sold_items/{sold_item}', [SoldItemController::class, 'show']);
Route::get('/sold_items', [SoldItemController::class, 'index']);
Route::post('/sold_items', [SoldItemController::class, 'store']);