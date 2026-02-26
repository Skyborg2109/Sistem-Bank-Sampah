# Dokumentasi Desain Dashboard Admin - Bank Sampah

## 📋 Ringkasan
Desain dashboard admin yang modern dan konsisten telah dibuat dengan sidebar dan topbar yang seragam di semua halaman. Desain menggunakan gradient purple-indigo sebagai warna utama dengan animasi smooth dan interaksi yang responsif.

## 🎨 Komponen Utama

### 1. Layout Admin (`layouts/admin.blade.php`)
Layout utama yang digunakan oleh semua halaman admin dengan fitur:

#### Sidebar (80px)
- **Logo/Brand**: Icon trash bin dengan gradient purple-indigo di bagian atas
- **Navigation Icons**:
  - 🏠 Home (Dashboard)
  - 👥 Data Pengguna
  - 🗑️ Data Sampah
  - 📄 Laporan
- **Logout Button**: Di bagian bawah dengan warna merah
- **Active State**: Gradient background untuk menu aktif
- **Hover Effects**: Smooth transform animation

#### Top Bar
- **Search Bar**: Input pencarian di sisi kiri (untuk halaman yang membutuhkan)
- **Notification Bell**: Icon dengan red dot indicator
- **User Profile**: 
  - Avatar dengan initial pengguna
  - Nama dan role pengguna
  - Gradient purple background

#### Main Content Area
- **Alert Messages**: Success dan error messages dengan animasi slide-in
- **Page Content**: Area konten utama dengan padding yang konsisten

### 2. Halaman Dashboard (`admin/index.blade.php`)
Halaman utama dengan fitur:

#### Welcome Banner
- Gradient purple-indigo background
- Greeting dengan nama pengguna
- Icon dekoratif

#### Statistics Cards (4 cards)
- Total Data Sampah (Purple)
- Total Pengguna (Blue)
- Total Laporan (Green)
- Total Berat Sampah (Orange)
- Setiap card dengan:
  - Icon dengan background warna
  - Angka statistik besar
  - Trend indicator

#### Quick Actions
- Link cepat ke halaman utama:
  - Kelola Data Sampah
  - Kelola Pengguna
  - Lihat Laporan
- Gradient background untuk setiap link
- Hover effects dengan transform

#### Recent Activity
- 5 aktivitas terbaru
- Timeline style dengan bullet points
- Timestamp relative (diffForHumans)

### 3. Halaman Kelola Data Sampah (`admin/datasampah/dataSampah.blade.php`)
Halaman utama untuk mengelola data sampah:

#### Action Bar
- **Search Input**: Real-time search di topbar
- **Filter & Sort Buttons**: Untuk filtering data
- **Tambah Sampah Button**: Gradient purple button dengan icon

#### Data Table
- **Columns**:
  - No (Auto increment)
  - Jenis Sampah (dengan icon dan ID)
  - Berat (Kg dengan format number)
  - Tanggal (Format: d M Y)
  - Status (Badge: Baru/Aktif/Lama berdasarkan umur data)
  - Aksi (Edit & Delete buttons)

- **Features**:
  - Hover effect pada row
  - Icon untuk setiap jenis data
  - Status badges dengan warna berbeda
  - Action buttons dengan hover animation

#### Table Footer
- Total Data
- Total Berat
- Info jumlah data yang ditampilkan

#### Empty State
- Icon besar
- Pesan informatif
- Button untuk tambah data pertama

### 4. Halaman Data Pengguna (`admin/dataPengguna/dataPengguna.blade.php`)
Halaman untuk mengelola pengguna:

#### Features
- **Search**: Real-time search
- **Role Filter**: Dropdown untuk filter berdasarkan role
- **Avatar Initials**: 2 huruf pertama nama dengan gradient background

#### Data Table
- **Columns**:
  - No
  - Nama Lengkap (dengan avatar dan ID)
  - Username (dengan icon)
  - Role (badge dengan warna berbeda: Admin/Petugas/Warga)
  - Aksi (Edit & Delete)

#### Table Footer
- Total Pengguna
- Breakdown per role (Admin, Petugas, Warga)

### 5. Halaman Laporan (`admin/laporan/index.blade.php`)
Halaman untuk melihat laporan warga:

#### Features
- **Search**: Real-time search
- **View Detail Modal**: Modal popup untuk melihat detail lengkap
- **Delete Confirmation**: Konfirmasi sebelum hapus

#### Data Table
- **Columns**:
  - No
  - Nama Warga (dengan avatar)
  - Jenis Sampah (dengan icon)
  - Berat (Kg)
  - Tanggal
  - Keterangan (truncated dengan tooltip)
  - Aksi (View & Delete)

#### Detail Modal
- Popup modal dengan animasi
- Menampilkan semua detail laporan
- Close button dan overlay click to close

## 🎨 Design System

### Colors
```css
Primary: Purple (#667eea) to Indigo (#764ba2)
Success: Green (#10b981)
Warning: Orange (#f59e0b)
Danger: Red (#ef4444)
Info: Blue (#3b82f6)
Gray Scale: #f9fafb to #111827
```

### Typography
- **Font Family**: Inter (Google Fonts)
- **Sizes**:
  - Heading 1: 3xl (1.875rem)
  - Heading 2: 2xl (1.5rem)
  - Heading 3: xl (1.25rem)
  - Body: sm (0.875rem)
  - Small: xs (0.75rem)

### Spacing
- **Sidebar**: 80px width
- **Content Padding**: 2rem (32px)
- **Card Padding**: 1.5rem (24px)
- **Gap**: 1.5rem (24px)

### Border Radius
- **Small**: 0.5rem (8px)
- **Medium**: 0.75rem (12px)
- **Large**: 1rem (16px)
- **XL**: 1.5rem (24px)

### Shadows
```css
Small: 0 1px 2px 0 rgba(0, 0, 0, 0.05)
Medium: 0 4px 6px -1px rgba(0, 0, 0, 0.1)
Large: 0 10px 15px -3px rgba(0, 0, 0, 0.1)
XL: 0 20px 25px -5px rgba(0, 0, 0, 0.1)
```

### Animations
```css
Slide In: opacity 0→1, translateY -10px→0, 0.3s ease-out
Hover Transform: translateY -2px, 0.2s ease
Scale: scale 1→1.1, 0.2s ease
```

## 📱 Responsive Design
- **Desktop**: Full layout dengan sidebar
- **Tablet**: Sidebar tetap, content menyesuaikan
- **Mobile**: Sidebar collapse (bisa dikembangkan)

## 🔧 JavaScript Features

### Search Functionality
```javascript
// Real-time search pada semua tabel
document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const tableRows = document.querySelectorAll('#tableBody tr');
    
    tableRows.forEach(row => {
        const text = row.textContent.toLowerCase();
        if (text.includes(searchValue)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
```

### Modal Functions
```javascript
// Show modal
function showDetail(params...) {
    // Set modal content
    document.getElementById('detailModal').classList.remove('hidden');
}

// Close modal
function closeModal() {
    document.getElementById('detailModal').classList.add('hidden');
}
```

## 📂 Struktur File

```
resources/views/
├── layouts/
│   └── admin.blade.php          # Layout utama
├── admin/
│   ├── index.blade.php          # Dashboard
│   ├── datasampah/
│   │   └── dataSampah.blade.php # Kelola Data Sampah
│   ├── dataPengguna/
│   │   └── dataPengguna.blade.php # Data Pengguna
│   └── laporan/
│       └── index.blade.php      # Laporan Warga
```

## 🚀 Cara Menggunakan

### 1. Untuk Halaman Baru
Extend layout admin:
```php
@extends('layouts.admin')

@section('title', 'Judul Halaman')

@section('topbar-left')
    {{-- Konten topbar kiri (search, dll) --}}
@endsection

@section('content')
    {{-- Konten halaman --}}
@endsection

@push('scripts')
    {{-- JavaScript tambahan --}}
@endpush
```

### 2. Menambahkan Menu Sidebar
Edit `layouts/admin.blade.php` pada bagian navigation:
```php
<a href="/route" class="nav-icon p-3 rounded-xl {{ request()->is('route*') ? 'bg-gradient-to-br from-purple-500 to-indigo-600 text-white' : 'text-gray-600 hover:bg-gray-100' }}">
    {{-- SVG Icon --}}
</a>
```

### 3. Menambahkan Alert
Alert otomatis muncul jika ada session success/error:
```php
return redirect()->back()->with('success', 'Pesan sukses');
return redirect()->back()->with('error', 'Pesan error');
```

## ✨ Fitur Unggulan

1. **Konsistensi**: Semua halaman menggunakan layout yang sama
2. **Responsif**: Menyesuaikan dengan berbagai ukuran layar
3. **Interaktif**: Animasi smooth pada hover dan click
4. **Modern**: Gradient colors dan glassmorphism effects
5. **User Friendly**: Search, filter, dan navigasi yang mudah
6. **Professional**: Typography dan spacing yang konsisten
7. **Accessible**: Contrast ratio yang baik dan semantic HTML

## 🎯 Best Practices

1. **Gunakan Layout**: Selalu extend `layouts.admin` untuk konsistensi
2. **Icon Consistency**: Gunakan Heroicons untuk semua icon
3. **Color Palette**: Ikuti color system yang sudah ditentukan
4. **Spacing**: Gunakan Tailwind spacing scale (4, 6, 8, dll)
5. **Animation**: Gunakan transition classes yang sudah ada
6. **Responsive**: Test di berbagai ukuran layar

## 📝 Catatan Penting

- Semua halaman sudah menggunakan Tailwind CSS
- Font Inter dari Google Fonts
- SVG icons dari Heroicons
- Carbon untuk format tanggal
- Session flash messages untuk feedback
- Real-time search tanpa reload

## 🔄 Update Selanjutnya

Untuk menambahkan halaman baru dengan desain konsisten:
1. Buat file blade baru
2. Extend `layouts.admin`
3. Ikuti struktur yang sama dengan halaman existing
4. Gunakan komponen yang sudah ada (buttons, tables, cards)
5. Tambahkan menu di sidebar jika perlu

---

**Dibuat dengan ❤️ untuk Sistem Bank Sampah**
