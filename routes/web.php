<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController; // Tambahkan import
use Illuminate\Support\Facades\Artisan;

/* ======================================================
| AUTH
====================================================== */
Route::get('/', [MenuController::class, 'index']);
Route::post('/prosesLogin', [LoginController::class, 'prosesLogin']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/logout', [LoginController::class, 'logout']); // Support form POST

Route::get('/daftar', [RegisterController::class, 'daftar']);
Route::post('/prosesDaftar', [RegisterController::class, 'prosesDaftar']);
Route::get('/backLogin', [MenuController::class, 'backLogin']);

/* ======================================================
| NOTIFICATIONS
====================================================== */
Route::get('/notifications/unread', [NotificationController::class, 'getUnread']);
Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead']);
Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead']);

/* ======================================================
| ADMIN
====================================================== */
Route::middleware(['role:admin'])->group(function () {

    Route::get('/admin', [MenuController::class, 'adminDashboard']);
    Route::get('/Admin/dashboard', [MenuController::class, 'adminDashboard']); // Alias untuk konsistensi

    /* ADMIN - PROFILE & SETTINGS */
    Route::get('/admin/profile', [ProfileController::class, 'show']);
    Route::post('/profile/update', [ProfileController::class, 'update']);
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword']);
    
    // Update route settings
    Route::get('/admin/settings', [SettingsController::class, 'index']);
    Route::post('/admin/settings/update', [SettingsController::class, 'update']);
    Route::get('/admin/activity-logs', [SettingsController::class, 'activityLogs']);
    Route::get('/admin/sessions', [SettingsController::class, 'sessions']);

    /* ADMIN - DATA SAMPAH */
    Route::get('/Admin/data-sampah', [MenuController::class, 'adminDataSampahIndex']);
    Route::get('/Admin/data-sampah/create', [MenuController::class, 'adminDataSampahCreate']);
    Route::post('/Admin/data-sampah/store', [MenuController::class, 'adminDataSampahStore']);

    // EDIT & UPDATE DATA SAMPAH
    Route::get('/Admin/data-sampah/edit/{id}', [MenuController::class, 'adminEditDataSampah']);
    Route::get('/Admin/dataSampah/edit/{id}', [MenuController::class, 'adminEditDataSampah']); // Alias
    Route::post('/Admin/data-sampah/update/{id}', [MenuController::class, 'adminUpdateDataSampah']);
    Route::post('/Admin/dataSampah/update/{id}', [MenuController::class, 'adminUpdateDataSampah']); // Alias

    Route::post('/Admin/data-sampah/delete/{id}', [MenuController::class, 'adminDataSampahDelete']);

    // ADMIN - DATA PENGGUNA
    Route::get('/Admin/dataPengguna', [MenuController::class, 'adminDataPengguna']);
    Route::get('/Admin/dataPengguna/create', [MenuController::class, 'adminCreatePengguna']);
    Route::post('/Admin/dataPengguna/store', [MenuController::class, 'adminStorePengguna']);

    Route::get('/Admin/dataPengguna/edit/{id}', [MenuController::class, 'adminEditPengguna']);
    Route::post('/Admin/dataPengguna/update/{id}', [MenuController::class, 'adminUpdatePengguna']);

    Route::post('/Admin/dataPengguna/delete/{id}', [MenuController::class, 'adminDeletePengguna']);

    // ADMIN - LAPORAN
    Route::get('/Admin/laporan', [MenuController::class, 'laporanIndex']);
    Route::get('/Admin/laporan/cetak', [MenuController::class, 'laporanCetak']); // Rute cetak laporan
    Route::post('/Admin/laporan/delete/{id}', [MenuController::class, 'laporanDelete']);

});

/* ======================================================
| PETUGAS
====================================================== */
Route::middleware(['role:petugas'])->group(function () {

    Route::get('/petugas', [MenuController::class, 'petugasDashboard']);

    // DATA SAMPAH
    Route::get('/petugas/datasampah', [MenuController::class, 'petugasDataSampahIndex']);
    Route::get('/petugas/datasampah/create', [MenuController::class, 'petugasDataSampahCreate']);
    Route::post('/petugas/datasampah/store', [MenuController::class, 'petugasDataSampahStore']);

    Route::get('/petugas/datasampah/edit/{id}', [MenuController::class, 'petugasDataSampahEdit']);
    Route::post('/petugas/datasampah/update/{id}', [MenuController::class, 'petugasDataSampahUpdate']);

    Route::post('/petugas/datasampah/delete/{id}', [MenuController::class, 'petugasDataSampahDelete']);
});
/* ======================================================
| WARGA
====================================================== */
Route::middleware(['role:Warga'])->group(function () {

    Route::get('/Warga', [MenuController::class, 'wargaDashboard']);
    Route::get('/warga/dashboard', [MenuController::class, 'wargaDashboard']);

    Route::get('/warga/laporan', [MenuController::class, 'wargaLaporanIndex']);
    Route::get('/warga/laporan/create', [MenuController::class, 'wargaLaporanCreate']);
    Route::post('/warga/laporan', [MenuController::class, 'wargaLaporanStore']);

});

/* ======================================================
| FALLBACK: RUN MIGRATION VIA URL (RAILWAY HACK)
====================================================== */
Route::get('/run-migration', function () {
    try {
        Artisan::call('migrate', ['--force' => true]);
        Artisan::call('db:seed', ['--force' => true]); // Memasukkan akun admin & petugas awal
        
        return response()->json([
            'status' => 'success',
            'message' => 'Migration and seeding completed successfully!',
            'output' => Artisan::output()
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage()
        ], 500);
    }
});
