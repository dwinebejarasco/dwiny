<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\User;
use App\Http\Controllers\ReportingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReservationController;
use App\Models\Customers;

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    // User routes
    Route::get('/get-users', [UserController::class, 'getUsers']);
    Route::post('/add-user', [UserController::class, 'addUser']);
    Route::put('/edit-user/{id}', [UserController::class, 'editUser']);
    Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);

 // Customer Routes (Add these if they are not already there!)
    Route::get('/customers', [CustomerController::class, 'index']);    // GET /api/customers
    Route::post('/customers', [CustomerController::class, 'store']);   // POST /api/customers
    Route::get('/customers/{customer}', [CustomerController::class, 'show']); // GET /api/customers/{id}
    Route::put('/customers/{customer}', [CustomerController::class, 'update']); // PUT /api/customers/{id}  <-- FOR EDITING
    Route::delete('/customers/{customer}', [CustomerController::class, 'destroy']); // DELETE /api/customers/{id} <-- FOR DELETING

    //Reservation routes
    Route::get('/reservation', [ReservationController::class, 'index']);
    Route::post('/reservation', [ReservationController::class, 'store']);
    Route::get('/reservation/{trip}', [ReservationController::class, 'show']);
    Route::put('/reservation/{trip}', [ReservationController::class, 'update']);
    Route::delete('/reservation/{trip}', [ReservationController::class, 'destroy']);


    Route::post('/logout', [AuthenticationController::class, 'logout']);
});
