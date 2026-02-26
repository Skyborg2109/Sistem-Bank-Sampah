# 🔍 Filter Role - Dokumentasi Fitur

## ✅ Fitur yang Ditambahkan

### Pencarian Berdasarkan Dropdown Role
Halaman Data Pengguna sekarang memiliki filter role yang **fungsional** dan dapat dikombinasikan dengan pencarian teks.

## 🎯 Cara Kerja

### 1. **Dropdown Role Filter**
- Lokasi: Di atas tabel, sebelah kiri tombol "Tambah Pengguna"
- Options:
  - **Semua Role** (default) - Tampilkan semua pengguna
  - **Admin** - Hanya tampilkan admin
  - **Petugas** - Hanya tampilkan petugas
  - **Warga** - Hanya tampilkan warga

### 2. **Kombinasi Filter**
Filter dapat dikombinasikan:
- **Search saja**: Filter berdasarkan nama/username
- **Role saja**: Filter berdasarkan role
- **Search + Role**: Filter berdasarkan keduanya

### 3. **Visual Feedback**
- **Filter Info**: Menampilkan jumlah pengguna yang ditampilkan
  - Muncul saat ada filter aktif
  - Format: "X pengguna ditampilkan"
  
- **Active Filter Indicator**: 
  - Dropdown role akan memiliki border purple saat ada role dipilih
  - Ring effect untuk menunjukkan filter aktif

- **No Results State**:
  - Icon search dengan pesan "Tidak ada hasil"
  - Saran: "Coba ubah filter atau kata kunci pencarian"

## 💻 Implementasi Teknis

### HTML Changes
```html
<!-- Dropdown dengan ID -->
<select id="roleFilter" class="...">
    <option value="">Semua Role</option>
    <option value="admin">Admin</option>
    <option value="petugas">Petugas</option>
    <option value="warga">Warga</option>
</select>

<!-- Filter Info (hidden by default) -->
<span id="filterInfo" class="text-xs text-gray-500 hidden">
    <span id="filterCount">0</span> pengguna ditampilkan
</span>
```

### JavaScript Logic
```javascript
function filterTable() {
    const searchValue = searchInput.value.toLowerCase();
    const roleValue = roleFilter.value.toLowerCase();
    
    tableRows.forEach(row => {
        const text = row.textContent.toLowerCase();
        const roleCell = row.querySelector('td:nth-child(4)'); // Role column
        const rowRole = roleCell ? roleCell.textContent.toLowerCase().trim() : '';
        
        // Check both conditions
        const matchesSearch = text.includes(searchValue);
        const matchesRole = roleValue === '' || rowRole.includes(roleValue);
        
        // Show if both match
        if (matchesSearch && matchesRole) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });
}
```

### Event Listeners
```javascript
// Filter on search input
searchInput.addEventListener('keyup', filterTable);

// Filter on role change
roleFilter.addEventListener('change', filterTable);

// Visual feedback for active filter
roleFilter.addEventListener('change', function() {
    if (this.value !== '') {
        this.classList.add('ring-2', 'ring-purple-500', 'border-purple-500');
    } else {
        this.classList.remove('ring-2', 'ring-purple-500', 'border-purple-500');
    }
});
```

## 🎨 Fitur Visual

### 1. **Filter Counter**
- Menampilkan jumlah hasil yang ditampilkan
- Hanya muncul saat ada filter aktif
- Auto-update saat filter berubah

### 2. **Active Filter Highlight**
- Border purple (ring-2) pada dropdown
- Menunjukkan filter sedang aktif
- Hilang saat "Semua Role" dipilih

### 3. **Empty State**
- Muncul saat tidak ada hasil
- Icon search yang besar
- Pesan yang jelas dan helpful
- Saran untuk mengubah filter

## 📊 Contoh Penggunaan

### Skenario 1: Filter Role Saja
```
1. Pilih "Admin" di dropdown
2. Hanya pengguna dengan role Admin yang ditampilkan
3. Counter menunjukkan: "3 pengguna ditampilkan"
4. Dropdown memiliki border purple
```

### Skenario 2: Search + Filter Role
```
1. Ketik "john" di search box
2. Pilih "Petugas" di dropdown
3. Hanya petugas dengan nama/username "john" yang ditampilkan
4. Counter menunjukkan: "1 pengguna ditampilkan"
```

### Skenario 3: No Results
```
1. Ketik "xyz" di search box
2. Pilih "Admin" di dropdown
3. Tidak ada hasil yang cocok
4. Tampil pesan: "Tidak ada hasil"
5. Saran: "Coba ubah filter atau kata kunci pencarian"
```

### Skenario 4: Reset Filter
```
1. Pilih "Semua Role" di dropdown
2. Kosongkan search box
3. Semua pengguna ditampilkan kembali
4. Filter info hilang
5. Border purple hilang dari dropdown
```

## ✨ Keunggulan Fitur

1. **Real-time**: Tidak perlu reload halaman
2. **Kombinasi**: Search dan role filter bekerja bersamaan
3. **Visual Feedback**: User tahu filter sedang aktif
4. **Counter**: Tahu berapa hasil yang ditampilkan
5. **Empty State**: Pesan yang jelas saat tidak ada hasil
6. **Performance**: Client-side filtering, sangat cepat
7. **UX**: Smooth dan responsive

## 🧪 Testing Checklist

### Basic Functionality
- [ ] Dropdown role dapat diklik dan dipilih
- [ ] Pilih "Admin" - hanya admin yang tampil
- [ ] Pilih "Petugas" - hanya petugas yang tampil
- [ ] Pilih "Warga" - hanya warga yang tampil
- [ ] Pilih "Semua Role" - semua tampil kembali

### Combined Filtering
- [ ] Search + role filter bekerja bersamaan
- [ ] Search dulu, lalu filter role
- [ ] Filter role dulu, lalu search
- [ ] Reset salah satu filter, yang lain tetap aktif

### Visual Feedback
- [ ] Filter counter muncul saat ada filter aktif
- [ ] Counter menunjukkan jumlah yang benar
- [ ] Dropdown memiliki border purple saat ada role dipilih
- [ ] Border hilang saat "Semua Role" dipilih
- [ ] Filter info hilang saat tidak ada filter aktif

### Empty State
- [ ] No results message muncul saat tidak ada hasil
- [ ] Icon dan pesan ditampilkan dengan benar
- [ ] Empty state hilang saat ada hasil lagi

### Edge Cases
- [ ] Filter dengan data kosong
- [ ] Filter dengan 1 data
- [ ] Filter dengan banyak data
- [ ] Ganti filter berkali-kali dengan cepat
- [ ] Search dan filter secara bergantian

## 🔧 Troubleshooting

### Filter Tidak Bekerja
**Penyebab**: JavaScript error atau ID tidak match
**Solusi**: 
- Cek console browser untuk error
- Pastikan ID `roleFilter`, `searchInput`, `tableBody` ada
- Pastikan script di dalam `@push('scripts')`

### Counter Tidak Update
**Penyebab**: Logic counting salah
**Solusi**:
- Cek `visibleCount` di console
- Pastikan `filterCount.textContent` diupdate
- Pastikan `filterInfo` tidak selalu hidden

### Border Purple Tidak Muncul
**Penyebab**: CSS classes tidak ditambahkan
**Solusi**:
- Cek event listener untuk `roleFilter`
- Pastikan Tailwind classes tersedia
- Inspect element untuk lihat classes

### Empty State Tidak Muncul
**Penyebab**: `updateEmptyState()` tidak dipanggil
**Solusi**:
- Pastikan function dipanggil di `filterTable()`
- Cek kondisi `hasData && visibleCount === 0`
- Pastikan `noResultsRow` dibuat dengan benar

## 📝 Notes

### Role Column Position
- Filter menggunakan `td:nth-child(4)` untuk kolom role
- Jika struktur tabel berubah, update selector ini
- Kolom: 1=No, 2=Nama, 3=Username, 4=Role, 5=Aksi

### Case Sensitivity
- Semua comparison menggunakan `.toLowerCase()`
- Role di database bisa "Admin", "admin", atau "ADMIN"
- Filter akan tetap bekerja karena di-lowercase

### Performance
- Client-side filtering sangat cepat
- Tidak ada AJAX request
- Cocok untuk data < 1000 rows
- Untuk data lebih banyak, pertimbangkan server-side filtering

## 🚀 Future Enhancements

1. **Multiple Role Selection**
   - Checkbox untuk pilih multiple roles
   - Filter: Admin + Petugas

2. **Save Filter State**
   - LocalStorage untuk remember filter
   - Auto-apply saat page reload

3. **Export Filtered Data**
   - Export hanya data yang ditampilkan
   - Format: Excel, PDF, CSV

4. **Advanced Filters**
   - Filter by date created
   - Filter by status
   - Custom date range

5. **URL Parameters**
   - Filter via URL: `?role=admin&search=john`
   - Shareable filtered view

---

**Filter role sekarang sudah fungsional dan siap digunakan! 🎉**
