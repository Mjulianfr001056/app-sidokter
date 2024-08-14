<?php

use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
}) -> name('dashboard');

Route::get('/kegiatan', function () {
    return view('kegiatan');
}) -> name('kegiatan');

Route::get('/beban-kerja', function () {
    return view('beban-kerja');
}) -> name('beban-kerja');
