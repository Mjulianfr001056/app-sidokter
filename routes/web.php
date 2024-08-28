<?php

use App\Http\Controllers\BebanKerjaMitraController;
use App\Http\Controllers\BebanKerjaOrganikController;
use App\Http\Controllers\CapaianAgregatController;
use App\Http\Controllers\CapaianOrganikController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManajemenSampelController;
use App\Http\Controllers\MasterKegiatanController;
use App\Http\Controllers\MasterMitraController;
use App\Http\Controllers\MasterOrganikController;
use App\Http\Controllers\MasterPerusahaanController;
use App\Http\Controllers\PenugasanController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index']) -> name('dashboard');

Route::group(['prefix' => 'capaian'], function () {
    Route::get('/agregat', [CapaianAgregatController::class, 'index'])
        ->name('capaian-agregat');
    Route::get('/organik', [CapaianOrganikController::class, 'index'])
        ->name('capaian-organik');
    Route::get('/organik/{nama}', [CapaianOrganikController::class, 'showDetail'])
        ->name('capaian-organik-detail');
    Route::get('/organik/mitra/{nama}', [CapaianOrganikController::class, 'showMitra'])
        ->name('capaian-organik-mitra');
});

Route::group(['prefix' => 'beban-kerja'], function () {
    Route::get('/tugas', [PenugasanController::class, 'index'])
        ->name('beban-kerja-tugas');

    Route::get('/tugas-organik/show/{id}', [PenugasanController::class, 'showOrganik'])
        ->name('penugasan-organik-detail');

    Route::get('/tugas-organik/create', [PenugasanController::class, 'createOrganik'])
        ->name('penugasan-organik-create-view');
    Route::post('/tugas-organik/save', [PenugasanController::class, 'storeOrganik'])
        ->name('penugasan-organik-create-save');

    Route::delete('/tugas-organik/delete/{id}', [PenugasanController::class, 'deleteOrganik'])
        ->name('penugasan-organik-delete');

    Route::get('/tugas-organik/edit/{id}', [PenugasanController::class, 'editOrganik'])
        ->name('penugasan-organik-edit-view');
    Route::put('/tugas-organik/edit/{id}', [PenugasanController::class, 'updateOrganik'])
        ->name('penugasan-organik-edit-save');

    Route::get('/organik', [BebanKerjaOrganikController::class, 'index'])
        ->name('beban-kerja-organik');
    Route::get('/mitra', [BebanKerjaMitraController::class, 'index'])
        ->name('beban-kerja-mitra');
});

Route::group(['prefix' => 'sampel'], function () {
    Route::get('/', [ManajemenSampelController::class, 'index'])
        ->name('manajemen-sampel');
});

Route::group(['prefix' => 'master'], function () {
    Route::get('/kegiatan', [MasterKegiatanController::class, 'index'])
        ->name('master-kegiatan');
    Route::get('/kegiatan/create', [MasterKegiatanController::class, 'create'])
        ->name('create-kegiatan');
    Route::post('/kegiatan/create', [MasterKegiatanController::class, 'store'])
        ->name('store-kegiatan');
    Route::get('/kegiatan/{id}', [MasterKegiatanController::class, 'view'])
        ->name('view-kegiatan');
    Route::get('/kegiatan/{id}/edit', [MasterKegiatanController::class, 'edit'])
        ->name('edit-kegiatan');

    Route::get('/organik', [MasterOrganikController::class, 'index'])
        ->name('master-organik');
    Route::get('/organik/{id}', [MasterOrganikController::class, 'view'])
        ->name('view-organik');
    Route::delete('/organik/{id}', [MasterOrganikController::class, 'delete'])
        ->name('remove-organik');


    Route::get('/mitra', [MasterMitraController::class, 'index'])
        ->name('master-mitra');
    Route::get('/perusahaan', [MasterPerusahaanController::class, 'index'])
        ->name('master-perusahaan');
});
