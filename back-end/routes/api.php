<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UsersController;

// auth (stateless, token-based)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/user', [AuthController::class, 'me']);
Route::post('/logout', [AuthController::class, 'logout']);

// simple users CRUD used by the frontend Users.vue (prototype)
Route::get('/users', [UsersController::class, 'index']);
Route::post('/users', [UsersController::class, 'store']);
Route::get('/users/{user}', [UsersController::class, 'show']);
Route::put('/users/{user}', [UsersController::class, 'update']);
Route::delete('/users/{user}', [UsersController::class, 'destroy']);

// plans & courses (list + user actions)
use App\Http\Controllers\Api\PlanController;
use App\Http\Controllers\Api\CourseController;

Route::get('/plans', [PlanController::class, 'index']);
Route::post('/plans/{plan}/purchase', [PlanController::class, 'purchase']);

Route::get('/courses', [CourseController::class, 'index']);
Route::post('/courses/{course}/complete', [CourseController::class, 'complete']);
