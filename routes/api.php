<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerBookingController;
use App\Http\Controllers\AdminBookingController;
use Illuminate\Support\Facades\Route;

// Public
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

// Customer
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/services',[ServiceController::class,'index']);
    Route::post('/bookings',[CustomerBookingController::class,'store']);
    Route::get('/bookings',[CustomerBookingController::class,'index']);
});

// Admin
Route::middleware(['auth:sanctum','admin'])->group(function(){
    Route::post('/services',[ServiceController::class,'store']);
    Route::put('/services/{id}',[ServiceController::class,'update']);
    Route::delete('/services/{id}',[ServiceController::class,'destroy']);
    Route::get('/admin/bookings',[AdminBookingController::class,'index']);
});
