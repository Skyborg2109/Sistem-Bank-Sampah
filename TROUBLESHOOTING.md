# 🔧 Troubleshooting & Fixes - Admin Dashboard

## ❌ Masalah yang Ditemukan

### 1. Error 404 pada `/Admin/dashboard`
**Penyebab**: Route tidak terdaftar dengan URL yang konsisten

**Solusi**: ✅ Ditambahkan route alias
```php
Route::get('/Admin/dashboard', [MenuController::class, 'adminDashboard']);
```

### 2. Login Redirect ke Halaman yang Salah
**Penyebab**: Setelah login, admin diredirect ke `/Admin/data-sampah` bukan dashboard

**Solusi**: ✅ Diubah redirect di LoginController
```php
case 'admin':
    return redirect('/Admin/dashboard'); // Sebelumnya: /Admin/data-sampah
```

### 3. Logout Form POST tidak Didukung
**Penyebab**: Route logout hanya mendukung GET, tapi layout menggunakan form POST

**Solusi**: ✅ Ditambahkan route POST untuk logout
```php
Route::post('/logout', [LoginController::class, 'logout']);
```

### 4. URL Tidak Konsisten untuk Edit/Delete
**Penyebab**: Beberapa route menggunakan `/Admin/dataSampah/` dan lainnya `/Admin/data-sampah/`

**Solusi**: ✅ Ditambahkan route alias untuk kedua format
```php
Route::get('/Admin/data-sampah/edit/{id}', [MenuController::class, 'adminEditDataSampah']);
Route::get('/Admin/dataSampah/edit/{id}', [MenuController::class, 'adminEditDataSampah']); // Alias
```

## ✅ Routes yang Sudah Diperbaiki

### Admin Routes
```
GET|HEAD   /admin                          → Dashboard (route lama)
GET|HEAD   /Admin/dashboard                → Dashboard (route baru)
GET|HEAD   /Admin/data-sampah              → List Data Sampah
GET|HEAD   /Admin/data-sampah/create       → Form Tambah
POST       /Admin/data-sampah/store        → Simpan Data
GET|HEAD   /Admin/data-sampah/edit/{id}    → Form Edit
POST       /Admin/data-sampah/update/{id}  → Update Data
POST       /Admin/data-sampah/delete/{id}  → Hapus Data
GET|HEAD   /Admin/dataPengguna             → List Pengguna
GET|HEAD   /Admin/laporan                  → List Laporan
```

### Auth Routes
```
GET        /                               → Login Page
POST       /prosesLogin                    → Process Login
GET        /logout                         → Logout (link)
POST       /logout                         → Logout (form)
```

## 🔐 Session & Middleware

### Session yang Disimpan saat Login
```php
session([
    'login'     => true,
    'nama_user' => $user->nama_user,
    'username'  => $user->username,
    'role'      => $user->role
]);
```

### Middleware Role
- **File**: `app/Http/Middleware/RoleMiddleware.php`
- **Alias**: `role` (terdaftar di `bootstrap/app.php`)
- **Cara Kerja**: Cek session `login` dan `role`

### Protected Routes
Semua route admin dilindungi dengan:
```php
Route::middleware(['role:admin'])->group(function () {
    // Routes admin
});
```

## 🧪 Cara Testing

### 1. Test Login
```
1. Buka: http://sistemmhs_banksampah.test/
2. Login dengan credentials admin
3. Seharusnya redirect ke: /Admin/dashboard
```

### 2. Test Navigation
```
1. Klik menu sidebar (Home, Data Pengguna, Data Sampah, Laporan)
2. Semua halaman harus load dengan layout konsisten
3. Search, filter, dan action buttons harus berfungsi
```

### 3. Test CRUD Data Sampah
```
1. Klik "Tambah Sampah"
2. Isi form dan submit
3. Data harus tersimpan dan redirect ke list
4. Test Edit dan Delete
```

### 4. Test Logout
```
1. Klik tombol Logout di sidebar
2. Session harus dihapus
3. Redirect ke halaman login
```

## 🐛 Debugging Tips

### Jika Masih Error 404
1. **Clear Route Cache**:
   ```bash
   php artisan route:clear
   php artisan route:cache
   ```

2. **Check Routes**:
   ```bash
   php artisan route:list --path=Admin
   ```

3. **Check Session**:
   Tambahkan di controller:
   ```php
   dd(session()->all());
   ```

### Jika Redirect Loop
1. **Check Middleware**: Pastikan role di session sesuai dengan middleware
2. **Check Session**: Pastikan session 'login' dan 'role' tersimpan
3. **Clear Session**:
   ```bash
   php artisan session:clear
   ```

### Jika Layout Tidak Muncul
1. **Check Blade Syntax**: Pastikan `@extends('layouts.admin')` ada di awal file
2. **Check View Path**: Pastikan file ada di `resources/views/layouts/admin.blade.php`
3. **Clear View Cache**:
   ```bash
   php artisan view:clear
   ```

## 📝 Checklist Setelah Fix

- [x] Route `/Admin/dashboard` terdaftar
- [x] Login redirect ke dashboard
- [x] Logout POST route tersedia
- [x] Edit/Delete routes konsisten
- [x] Middleware terdaftar dengan benar
- [x] Session disimpan dengan benar
- [ ] Test semua halaman berfungsi
- [ ] Test CRUD operations
- [ ] Test responsive design

## 🚀 Next Steps

1. **Test Aplikasi**: Login dan test semua fitur
2. **Check Database**: Pastikan ada data untuk ditampilkan
3. **Responsive Test**: Test di berbagai ukuran layar
4. **Browser Test**: Test di Chrome, Firefox, dll

## 📞 Jika Masih Ada Masalah

Cek hal-hal berikut:
1. **Database Connection**: Pastikan `.env` sudah benar
2. **Session Driver**: Pastikan session driver di `.env` (default: file)
3. **Permissions**: Pastikan folder `storage` writable
4. **Cache**: Clear semua cache (route, config, view)

---

**Semua fix sudah diterapkan! Silakan test aplikasi Anda. 🎉**
