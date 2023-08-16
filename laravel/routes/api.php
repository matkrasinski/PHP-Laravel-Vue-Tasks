<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CarCustomerController;
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
Route::middleware('check.customer.exists')->get('/customers/{customerId}', [CustomerController::class, 'show']);
Route::post('/customers/new', [CustomerController::class, 'store']);

// Cars routes
Route::get('/cars', [CarController::class, 'index']);
Route::post('/cars/new', [CarController::class, 'store']);
Route::middleware('check.car.exists')->delete('/cars/delete/{carId}', [CarController::class, 'destroy']);

// Cars-Customers routes
Route::middleware(['check.car.exists', 'check.customer.exists'])->post('/car-customer/{customerId}/assign/{carId}', [CarCustomerController::class, 'assignCar']);
Route::middleware(['check.car.exists', 'check.customer.exists'])->post('/car-customer/{customerId}/release/{carId}', [CarCustomerController::class, 'releaseCar']);
Route::middleware(['check.car.exists', 'check.customer.exists'])->delete('/car-customer/{customerId}/return/{carId}', [CarCustomerController::class, 'returnCar']);
Route::middleware(['check.car.exists', 'check.customer.exists'])->get('/car-customer/{customerId}/is-using/{carId}', [CarCustomerController::class, 'isUsingCar']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
