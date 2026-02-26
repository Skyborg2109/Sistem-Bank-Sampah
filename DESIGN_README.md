# 🎨 Quick Reference - Admin Dashboard Design

## 📁 File yang Dibuat/Diupdate

### Layout Utama
- ✅ `resources/views/layouts/admin.blade.php` - Layout konsisten untuk semua halaman

### Halaman Admin
- ✅ `resources/views/admin/index.blade.php` - Dashboard utama
- ✅ `resources/views/admin/datasampah/dataSampah.blade.php` - Kelola Data Sampah
- ✅ `resources/views/admin/dataPengguna/dataPengguna.blade.php` - Data Pengguna
- ✅ `resources/views/admin/laporan/index.blade.php` - Laporan Warga

## 🎯 Fitur Utama

### Sidebar (Konsisten di Semua Halaman)
- Logo dengan gradient purple-indigo
- Menu navigasi dengan icon
- Active state dengan gradient background
- Logout button di bawah

### Top Bar (Konsisten di Semua Halaman)
- Search bar (untuk halaman yang membutuhkan)
- Notification bell dengan indicator
- User profile dengan avatar dan info

### Halaman Dashboard
- Welcome banner dengan gradient
- 4 statistics cards (Data Sampah, Pengguna, Laporan, Berat)
- Quick action links
- Recent activity feed

### Halaman Kelola Data Sampah
- Real-time search
- Filter & sort buttons
- Modern data table dengan:
  - Icon untuk setiap jenis sampah
  - Status badges (Baru/Aktif/Lama)
  - Edit & delete actions
- Table footer dengan statistik

### Halaman Data Pengguna
- Real-time search
- Role filter dropdown
- Avatar dengan initials
- Role badges dengan warna berbeda
- Statistics per role

### Halaman Laporan
- Real-time search
- Detail modal popup
- View & delete actions
- Statistics total laporan dan berat

## 🎨 Design System

### Warna Utama
- **Primary**: Purple (#667eea) → Indigo (#764ba2)
- **Success**: Green (#10b981)
- **Warning**: Orange (#f59e0b)
- **Danger**: Red (#ef4444)
- **Info**: Blue (#3b82f6)

### Typography
- **Font**: Inter (Google Fonts)
- **Sizes**: xs, sm, base, lg, xl, 2xl, 3xl

### Komponen
- **Buttons**: Gradient dengan shadow dan hover effects
- **Cards**: Rounded corners dengan shadow
- **Tables**: Hover effects pada rows
- **Badges**: Rounded dengan warna role-specific
- **Modals**: Centered dengan backdrop blur

## 🚀 Cara Menggunakan

### 1. Membuat Halaman Baru
```php
@extends('layouts.admin')

@section('title', 'Judul Halaman')

@section('topbar-left')
    {{-- Search atau konten topbar kiri --}}
@endsection

@section('content')
    {{-- Konten halaman Anda --}}
@endsection

@push('scripts')
    {{-- JavaScript tambahan --}}
@endpush
```

### 2. Menambahkan Alert
```php
// Controller
return redirect()->back()->with('success', 'Berhasil!');
return redirect()->back()->with('error', 'Gagal!');

// Otomatis muncul di halaman dengan animasi
```

### 3. Menambahkan Menu Sidebar
Edit `layouts/admin.blade.php`:
```php
<a href="/route" class="nav-icon p-3 rounded-xl {{ request()->is('route*') ? 'bg-gradient-to-br from-purple-500 to-indigo-600 text-white' : 'text-gray-600 hover:bg-gray-100' }}">
    {{-- Icon SVG --}}
</a>
```

## 📱 Responsive
- Desktop: Full layout
- Tablet: Sidebar tetap, content menyesuaikan
- Mobile: Ready untuk dikembangkan

## ✨ Animasi
- Slide-in untuk alerts dan modals
- Hover transform untuk buttons dan cards
- Smooth transitions untuk semua interaksi

## 🔍 Search Functionality
Semua halaman dengan tabel memiliki real-time search:
```javascript
// Otomatis filter rows berdasarkan input
// Tidak perlu reload halaman
```

## 📊 Statistics
Setiap halaman menampilkan statistik relevan:
- Dashboard: Total semua data
- Data Sampah: Total data dan berat
- Data Pengguna: Total per role
- Laporan: Total laporan dan berat

## 🎯 Next Steps

1. **Test Halaman**: Akses setiap halaman dan test fitur-fiturnya
2. **Tambah Data**: Pastikan CRUD berfungsi dengan baik
3. **Responsive**: Test di berbagai ukuran layar
4. **Customization**: Sesuaikan warna/text sesuai kebutuhan

## 📚 Dokumentasi Lengkap
Lihat `DESIGN_DOCUMENTATION.md` untuk dokumentasi detail.

---

**Happy Coding! 🚀**
