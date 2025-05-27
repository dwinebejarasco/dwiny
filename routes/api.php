<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\User;
use App\Http\Controllers\ReportingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ReservationController;

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    // User routes
    Route::get('/get-users', [UserController::class, 'getUsers']);
    Route::post('/add-user', [UserController::class, 'addUser']);
    Route::put('/edit-user/{id}', [UserController::class, 'editUser']);
    Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);

Route::get('/customers', [Customer::class, 'index']); // GET /api/customers
    Route::post('/customers', [Customer::class, 'store']); // POST /api/customers

    //Reservation routes
    Route::get('/reservation', [ReservationController::class, 'index']);
    Route::post('/reservation', [ReservationController::class, 'store']);
    Route::get('/reservation/{trip}', [ReservationController::class, 'show']);
    Route::put('/reservation/{trip}', [ReservationController::class, 'update']);
    Route::delete('/reservation/{trip}', [ReservationController::class, 'destroy']);


    Route::post('/logout', [AuthenticationController::class, 'logout']);
});
