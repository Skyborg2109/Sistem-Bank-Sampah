# 🔔 Notification & Profile Dropdown - Dokumentasi

## ✅ Fitur yang Ditambahkan

### 1. **Notification Bell Dropdown** ⭐
Notification bell di topbar sekarang **fungsional** dengan dropdown menu.

### 2. **User Profile Dropdown** ⭐
User profile di topbar sekarang **fungsional** dengan dropdown menu.

## 🎯 Fitur Notification Dropdown

### Tampilan
- **Icon**: Bell dengan badge merah (pulse animation)
- **Badge**: Menunjukkan jumlah notifikasi baru (contoh: "3 Baru")
- **Position**: Dropdown muncul di bawah icon, aligned right

### Konten Dropdown
- **Header**: 
  - Judul "Notifikasi"
  - Badge jumlah notifikasi baru

- **Notification Items** (3 sample):
  1. **Pengguna baru terdaftar**
     - Icon: User (blue)
     - Detail: "John Doe mendaftar sebagai warga"
     - Timestamp: "5 menit yang lalu"
     - Indicator: Blue dot (unread)

  2. **Data sampah ditambahkan**
     - Icon: Trash (green)
     - Detail: "15 Kg sampah plastik tercatat"
     - Timestamp: "1 jam yang lalu"
     - Indicator: Green dot (unread)

  3. **Laporan baru masuk**
     - Icon: Document (purple)
     - Detail: "Warga mengirim laporan sampah"
     - Timestamp: "3 jam yang lalu"
     - Indicator: Purple dot (unread)

- **Footer**:
  - Link "Lihat Semua Notifikasi"

### Interaksi
- **Click bell**: Toggle dropdown
- **Click notification item**: Navigate to detail (placeholder)
- **Click outside**: Close dropdown
- **Hover item**: Background highlight
- **Max height**: 96 (overflow scroll)

## 🎯 Fitur Profile Dropdown

### Tampilan
- **Avatar**: Circle dengan initial pengguna (gradient purple)
- **Info**: Username dan role
- **Arrow**: Down chevron icon
- **Hover**: Background gray-200

### Konten Dropdown
- **Header**:
  - Avatar besar (12x12)
  - Username (bold)
  - Role

- **Menu Items**:
  1. **Dashboard**
     - Icon: Home
     - Link: `/Admin/dashboard`

  2. **Profil Saya**
     - Icon: User
     - Link: `#` (placeholder)

  3. **Pengaturan**
     - Icon: Settings
     - Link: `#` (placeholder)

- **Footer** (separated):
  - **Logout** (red color)
    - Icon: Logout
    - Form POST to `/logout`

### Interaksi
- **Click profile**: Toggle dropdown
- **Click menu item**: Navigate to page
- **Click logout**: Submit form logout
- **Click outside**: Close dropdown
- **Hover item**: Background highlight

## 💻 Implementasi Teknis

### CSS Classes
```css
.dropdown {
    position: relative;
}

.dropdown-menu {
    display: none;
    position: absolute;
    right: 0;
    top: 100%;
    margin-top: 0.5rem;
    min-width: 20rem;
    background: white;
    border-radius: 0.75rem;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    z-index: 50;
    opacity: 0;
    transform: translateY(-10px);
    transition: all 0.2s ease;
}

.dropdown-menu.show {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

.pulse-animation {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
```

### JavaScript Logic
```javascript
// Toggle notification dropdown
notificationBtn.addEventListener('click', function(e) {
    e.stopPropagation();
    notificationMenu.classList.toggle('show');
    profileMenu.classList.remove('show'); // Close other dropdown
});

// Toggle profile dropdown
profileBtn.addEventListener('click', function(e) {
    e.stopPropagation();
    profileMenu.classList.toggle('show');
    notificationMenu.classList.remove('show'); // Close other dropdown
});

// Close dropdowns when clicking outside
document.addEventListener('click', function(e) {
    if (!notificationBtn.contains(e.target) && !notificationMenu.contains(e.target)) {
        notificationMenu.classList.remove('show');
    }
    if (!profileBtn.contains(e.target) && !profileMenu.contains(e.target)) {
        profileMenu.classList.remove('show');
    }
});

// Prevent dropdown from closing when clicking inside
notificationMenu.addEventListener('click', function(e) {
    e.stopPropagation();
});
```

## 🎨 Design Details

### Notification Dropdown
- **Width**: 20rem (320px)
- **Max Height**: 96 (384px) with scroll
- **Border Radius**: 0.75rem (12px)
- **Shadow**: 0 10px 25px rgba(0, 0, 0, 0.1)
- **Animation**: Slide down with fade in

### Profile Dropdown
- **Width**: 16rem (256px)
- **Border Radius**: 0.75rem (12px)
- **Shadow**: 0 10px 25px rgba(0, 0, 0, 0.1)
- **Animation**: Slide down with fade in

### Colors
- **Notification Badge**: Red (#ef4444)
- **Unread Indicator**: Blue/Green/Purple dots
- **Hover Background**: Gray-100 (#f3f4f6)
- **Logout Text**: Red-600 (#dc2626)
- **Logout Hover**: Red-50 (#fef2f2)

## ✨ Fitur Unggulan

### Notification
1. ✅ **Badge Counter**: Menunjukkan jumlah notifikasi baru
2. ✅ **Pulse Animation**: Badge berkedip untuk menarik perhatian
3. ✅ **Categorized Icons**: Setiap notifikasi punya icon berbeda
4. ✅ **Timestamp**: Waktu relatif (5 menit, 1 jam, dll)
5. ✅ **Unread Indicators**: Dot berwarna untuk notifikasi belum dibaca
6. ✅ **Scrollable**: Max height dengan scroll untuk banyak notifikasi
7. ✅ **View All Link**: Link ke halaman semua notifikasi

### Profile
1. ✅ **User Info**: Avatar, username, dan role
2. ✅ **Quick Links**: Dashboard, Profile, Settings
3. ✅ **Logout**: Form logout terintegrasi
4. ✅ **Visual Feedback**: Hover effects
5. ✅ **Icon Consistency**: Setiap menu punya icon
6. ✅ **Separated Logout**: Logout dipisah dengan border

## 🧪 Testing Checklist

### Notification Dropdown
- [ ] Click bell icon → dropdown muncul
- [ ] Click bell lagi → dropdown hilang
- [ ] Click outside → dropdown hilang
- [ ] Click inside dropdown → dropdown tetap terbuka
- [ ] Hover notification item → background highlight
- [ ] Badge pulse animation berfungsi
- [ ] Scroll berfungsi jika notifikasi banyak
- [ ] Click "Lihat Semua" → navigate (placeholder)

### Profile Dropdown
- [ ] Click profile → dropdown muncul
- [ ] Click profile lagi → dropdown hilang
- [ ] Click outside → dropdown hilang
- [ ] Click inside dropdown → dropdown tetap terbuka
- [ ] Hover menu item → background highlight
- [ ] Click Dashboard → navigate to dashboard
- [ ] Click Logout → submit form dan logout
- [ ] Logout hover → background red-50

### Interaction
- [ ] Click bell → profile dropdown tertutup
- [ ] Click profile → notification dropdown tertutup
- [ ] Click outside → semua dropdown tertutup
- [ ] Dropdown animation smooth
- [ ] Z-index correct (dropdown di atas konten)

## 🔧 Customization

### Menambah Notification Item
```html
<a href="#" class="notification-item block px-4 py-3 border-b border-gray-100 transition">
    <div class="flex items-start space-x-3">
        <div class="flex-shrink-0 w-10 h-10 bg-[COLOR]-100 rounded-full flex items-center justify-center">
            <!-- Icon SVG -->
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-sm font-medium text-gray-900">[TITLE]</p>
            <p class="text-xs text-gray-500 mt-1">[DETAIL]</p>
            <p class="text-xs text-gray-400 mt-1">[TIMESTAMP]</p>
        </div>
        <span class="flex-shrink-0 w-2 h-2 bg-[COLOR]-500 rounded-full"></span>
    </div>
</a>
```

### Menambah Profile Menu Item
```html
<a href="[URL]" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
    <svg class="w-5 h-5 mr-3 text-gray-400">
        <!-- Icon SVG -->
    </svg>
    [MENU TEXT]
</a>
```

### Mengubah Badge Count
```html
<span class="px-2 py-1 bg-red-100 text-red-600 text-xs font-semibold rounded-full">
    [NUMBER] Baru
</span>
```

## 🚀 Future Enhancements

### Notification
1. **Real-time Updates**: WebSocket untuk notifikasi real-time
2. **Mark as Read**: Klik untuk tandai sudah dibaca
3. **Filter**: Filter by type (user, sampah, laporan)
4. **Load More**: Pagination untuk notifikasi lama
5. **Sound**: Notifikasi suara untuk notifikasi baru
6. **Desktop Notification**: Browser notification API

### Profile
1. **Profile Page**: Halaman profil lengkap
2. **Settings Page**: Halaman pengaturan
3. **Change Password**: Fitur ganti password
4. **Avatar Upload**: Upload foto profil
5. **Theme Toggle**: Dark/Light mode
6. **Language**: Multi-language support

## 📝 Notes

### Sample Data
- Notifikasi saat ini menggunakan sample data
- Untuk production, fetch dari database
- Timestamp menggunakan relative time
- Badge count harus dynamic dari database

### Security
- Logout menggunakan POST method (CSRF protected)
- Profile links bisa ditambahkan middleware auth
- Notification links harus validated

### Performance
- Dropdown lazy load (only show when clicked)
- Notification items limited (max 10-20)
- Use pagination for more notifications
- Cache notification count

## ✅ Summary

Kedua dropdown sekarang **FUNGSIONAL** dengan:
- ✅ Notification bell dengan badge dan pulse animation
- ✅ Notification dropdown dengan 3 sample notifications
- ✅ User profile dengan dropdown menu
- ✅ Profile menu dengan Dashboard, Profile, Settings, Logout
- ✅ Smooth animations (slide down + fade in)
- ✅ Click outside to close
- ✅ Toggle functionality
- ✅ Hover effects
- ✅ Responsive design
- ✅ Consistent styling

**Siap untuk digunakan! 🎉**

---

**Next Steps**: Integrasikan dengan database untuk notifikasi real dan profile data dinamis.
