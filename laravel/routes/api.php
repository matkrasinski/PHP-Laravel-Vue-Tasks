<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;
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

// Customers routes
Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customers/{customerId}', [CustomerController::class, 'show']);

// Cars routes
Route::get('/cars', [CarController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
