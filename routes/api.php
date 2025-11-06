<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TenancyController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\DisputeController;
use App\Http\Controllers\SystemConfigController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\ListController;

// Public routes
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Protected routes (JWT)
Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::apiResource( 'users', UserController::class);
    Route::apiResource('properties', PropertyController::class);
    Route::apiResource('units', UnitController::class);
    Route::apiResource('tenancies', TenancyController::class);
    Route::apiResource('payments', PaymentController::class);
    Route::apiResource('invoices', InvoiceController::class);
    Route::apiResource('support-tickets', SupportTicketController::class);
    Route::apiResource('disputes', DisputeController::class);
    Route::apiResource('activity-logs', ActivityLogController::class);
    Route::apiResource('system-configs', SystemConfigController::class);
    Route::get('lists', [ListController::class, 'index']);

});

