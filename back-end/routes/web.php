<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// API routes are now loaded directly by the bootstrap (see bootstrap/app.php)
// — no manual include required here.
