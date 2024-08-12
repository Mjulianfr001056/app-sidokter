<?php

use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-page', [PegawaiController::class, 'getAll']);

Route::get('/test-page/{id}', [PegawaiController::class, 'getById']);
