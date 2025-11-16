<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\menuController;

//Login & Reg
Route::get('/', [menuController::class, 'index']);
Route::get('/BackLogin', [menuController::class, 'backLogin']);
Route::get('/Daftar', [menuController::class, 'Daftar']);

//admin
Route::post('Admin/dashboard', [menuController::class, 'adminDashboard']);
Route::get('/Admin/dashboard', [menuController::class, 'adminDashboard']);
Route::post('/Admin/kelolaDataSampah', [menuController::class, 'AdminkelolaDataSampah']);
Route::get('Admin/kelolaDataSampah', [menuController::class, 'AdminkelolaDataSampah']);
Route::get('/Admin/dataSampah', [menuController::class, 'dataSampah']);
Route::post('/Admin/kirimDataSampah', [menuController::class, 'kirimDataSampah']);
Route::post('Admin/dataPengguna', [menuController::class, 'dataPengguna']);
Route::get('/Admin/dataPengguna', [menuController::class, 'dataPengguna']);
Route::get('/Admin/summary', [menuController::class, 'AdminSummary']);
Route::get('/Admin/AdminLaporan', [menuController::class, 'adminLaporan']);

//petugas
Route::post('petugas/dashboard', [menuController::class, 'petugasDashboard']);
Route::get('/petugas/dashboard', [menuController::class, 'petugasDashboard']);
Route::post('/petugas/kelolaDataSampah', [menuController::class, 'kelolaDataSampah']);
Route::get('petugas/kelolaDataSampah', [menuController::class, 'kelolaDataSampah']);
Route::get('/petugas/dataSampah', [menuController::class, 'dataSampah']);
Route::post('/petugas/kirimDataSampah', [menuController::class, 'kirimDataSampah']);
Route::get('/petugas/summary', [menuController::class, 'summary']);


//warga
Route::post('warga/dashboard', [menuController::class, 'wargaDashboard']);
Route::get('/warga/dashboard', [menuController::class, 'wargaDashboard']);
Route::get('/warga/laporan', [menuController::class, 'laporan']);
Route::get('/warga/listlaporan', [menuController::class, 'list']);
