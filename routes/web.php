<?php

use App\Http\Controllers\DragonController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dragons', [DragonController::class, 'index']);
Route::get('dragons/create', [DragonController::class, 'create']);
Route::post('dragons', [DragonController::class, 'store']);
Route::get('dragons/{id}/edit', [DragonController::class, 'edit']);
Route::put('dragons/{id}', [DragonController::class, 'update']);
Route::delete('dragons/{id}', [DragonController::class, 'destroy']);

Route::get('trainers', [TrainerController::class, 'index']);
Route::get('trainers/create', [TrainerController::class, 'create']);
Route::post('trainers', [TrainerController::class, 'store']);
Route::get('trainers/{id}/edit', [TrainerController::class, 'edit']);
Route::put('trainers/{id}', [TrainerController::class, 'update']);
Route::delete('trainers/{id}', [TrainerController::class, 'destroy']);
