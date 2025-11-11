<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\menuController;

//Login & Reg
Route::get('/', [menuController::class, 'index']);
Route::get('/BackLogin', [menuController::class, 'backLogin']);
Route::get('/Daftar', [menuController::class, 'Daftar']);

//admin
Route::post('admin/dashboard', [menuController::class, 'adminDashboard']);


//petugas
Route::post('petugas/dashboard', [menuController::class, 'petugasDashboard']);
Route::get('/petugas/dashboard', [menuController::class, 'petugasDashboard']);
Route::post('/petugas/kelolaDataSampah', [menuController::class, 'kelolaDataSampah']);
Route::get('petugas/kelolaDataSampah', [menuController::class, 'kelolaDataSampah']);
Route::get('/petugas/dataSampah', [menuController::class, 'dataSampah']);
Route::post('/petugas/kirimDataSampah', [menuController::class, 'kirimDataSampah']);


//warga
Route::post('warga/dashboard', [menuController::class, 'wargaDashboard']);
Route::get('/warga/dashboard', [menuController::class, 'wargaDashboard']);
Route::get('/warga/laporan', [menuController::class, 'laporan']);
Route::get('/warga/listlaporan', [menuController::class, 'list']);
