<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware('api')->prefix('api')->group(function () {
    Route::apiResource('users', UserController::class);
});
