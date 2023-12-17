<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ValidateLimitStudentsToUser;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    // rotas privadas
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::post('exercises', [ExerciseController::class, 'store']);
    Route::get('exercises', [ExerciseController::class, 'index']);
    Route::delete('exercises/{id}', [ExerciseController::class, 'destroy']);
    Route::post('students', [StudentController::class, 'store'])->middleware(ValidateLimitStudentsToUser::class);





});

// rota pública
Route::post('users', [UserController::class, 'store']);
Route::post('login', [AuthController::class, 'store']);
