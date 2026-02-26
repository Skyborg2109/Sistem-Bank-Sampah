# Panduan Deployment ke DirectAdmin (cPanel)

Panduan ini akan membantu Anda mengupload dan mengkonfigurasi proyek Laravel "SistemMhs_BankSampah" ke hosting yang menggunakan DirectAdmin atau cPanel.

## 1. Persiapan File (Di Komputer Lokal)

Saya telah melakukan beberapa pembersihan otomatis, namun pastikan langkah berikut:

1.  **Database**: File backup database telah dibuat secara otomatis dengan nama `database_backup.sql` di folder root proyek.
2.  **Build Frontend**: Aset frontend (CSS/JS) telah di-compile.
3.  **Zip Project**:
    *   Compress/Zip seluruh folder proyek `SistemMhs_BankSampah`.
    *   **PENTING**: Anda boleh mengecualikan folder `node_modules` dan `.git` untuk menghemat ukuran, tetapi **JANGAN** kecualikan folder `vendor` jika Anda tidak bisa menjalankan `composer install` di server. Untuk shared hosting biasa, lebih aman upload folder `vendor` yang sudah ada.

## 2. Upload ke Hosting (DirectAdmin)

### A. Upload File Proyek
1.  Login ke DirectAdmin / cPanel.
2.  Buka **File Manager**.
3.  Masuk ke folder root domain Anda (biasanya sejajar dengan `public_html`, bukan di dalamnya).
4.  Buat folder baru, misal `laravel_app`.
5.  Upload file `.zip` proyek Anda ke dalam folder `laravel_app` dan **Extract**.
6.  Struktur seharusnya: `/domains/namadomain.com/laravel_app/app`, `/domains/namadomain.com/laravel_app/config`, dll.

### B. Konfigurasi Folder Public
Laravel menggunakan folder `public` sebagai root web, sedangkan hosting menggunakan `public_html`.

1.  Masuk ke folder `laravel_app/public` di File Manager.
2.  **Pindahkan (Move)** semua isi folder `public` (termasuk `.htaccess`, `index.php`, folder `images`, `build`, dll) ke folder `public_html`.
3.  Sekarang folder `laravel_app/public` harusnya kosong.

### C. Edit index.php
1.  Buka file `public_html/index.php` dan edit (klik kanan -> Edit).
2.  Cari baris yang memuat `__DIR__.'/../storage/` dan `__DIR__.'/../vendor/`.
3.  Ubah jalur (path) tersebut agar mengarah ke folder `laravel_app` yang baru Anda buat.
    
    Contoh perubahan:
    ```php
    // GANTI:
    if (file_exists(__DIR__.'/../storage/framework/maintenance.php')) {
        require __DIR__.'/../storage/framework/maintenance.php';
    }
    
    // MENJADI (sesuaikan 'laravel_app' dengan nama folder Anda):
    if (file_exists(__DIR__.'/../laravel_app/storage/framework/maintenance.php')) {
        require __DIR__.'/../laravel_app/storage/framework/maintenance.php';
    }
    
    // GANTI:
    require __DIR__.'/../vendor/autoload.php';
    
    // MENJADI:
    require __DIR__.'/../laravel_app/vendor/autoload.php';
    
    // GANTI:
    $app = require_once __DIR__.'/../bootstrap/app.php';
    
    // MENJADI:
    $app = require_once __DIR__.'/../laravel_app/bootstrap/app.php';
    ```

## 3. Konfigurasi Database

1.  Buka **MySQL Management** atau **Database Wizard** di DirectAdmin.
2.  Buat Database baru dan User Database baru. Catat nama database, username, dan passwordnya.
3.  Buka **phpMyAdmin**.
4.  Pilih database yang baru dibuat.
5.  Klik tab **Import**.
6.  Upload file `database_backup.sql` yang ada di root folder proyek lokal Anda.

## 4. Konfigurasi Environment (.env)

1.  Kembali ke File Manager, masuk ke folder `laravel_app`.
2.  Cari file `.env`. Jika tidak ada, cari `.env.example`, copy menjadi `.env`.
3.  Edit file `.env`:
    *   **APP_ENV**: Ubah dari `local` menjadi `production`.
    *   **APP_DEBUG**: Ubah dari `true` menjadi `false`.
    *   **APP_URL**: Ubah menjadi URL domain Anda (misal `https://namadomain.com`).
    *   **Database**: Masukkan detail yang dibuat di langkah 3.
        ```
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=nama_db_hosting_anda
        DB_USERNAME=user_db_hosting_anda
        DB_PASSWORD=password_db_hosting_anda
        ```

## 5. Storage Link (Opsional tapi Penting)
Jika aplikasi Anda menyimpan file upload (seperti gambar profil), Anda perlu symlink.
Di Shared Hosting, Anda seringkali tidak memiliki akses terminal SSH. Anda bisa membuat Route sementara untuk melakukan symlink.

1.  Tambahkan route berikut di `routes/web.php` (di file lokal lalu upload, atau edit di server):
    ```php
    Route::get('/symlink', function () {
        Artisan::call('storage:link');
        return 'Storage link complete';
    });
    ```
2.  Akses `https://namadomain.com/symlink` sekali saja.
3.  Hapus route tersebut setelah selesai.

## Selesai!
Aplikasi Anda seharusnya sudah bisa diakses di domain utama.
