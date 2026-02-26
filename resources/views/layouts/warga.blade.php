<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <title>@yield('title', 'Dashboard Warga') - Bank Sampah</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #f5f5f5;
        }

        /* Header */
        .header {
            background: white;
            border-bottom: 1px solid #e0e0e0;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo-box {
            width: 80px;
            height: 50px;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f9f9f9;
        }

        .logo-box img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification-bell {
            width: 30px;
            height: 30px;
            cursor: pointer;
        }

        .user-profile {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #4CAF50;
            color: white;
            font-weight: 600;
            cursor: pointer;
        }

        /* Layout */
        .main-layout {
            display: flex;
            min-height: calc(100vh - 80px);
        }

        /* Sidebar */
        .sidebar {
            width: 70px;
            background: white;
            border-right: 1px solid #e0e0e0;
            padding: 20px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar-menu {
            list-style: none;
            width: 100%;
        }

        .sidebar-menu li {
            margin-bottom: 10px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            text-decoration: none;
            color: #666;
            font-size: 24px;
            transition: background 0.2s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: #f0f0f0;
            color: #4CAF50;
        }

        /* Content */
        .content {
            flex: 1;
            padding: 30px;
        }

        .page-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 25px;
            color: #333;
            text-align: center;
        }

        /* Search Bar */
        .search-container {
            margin-bottom: 20px;
        }

        .search-input {
            width: 100%;
            max-width: 500px;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .search-input::placeholder {
            color: #999;
        }

        /* Summary Box */
        .summary-box {
            width: 150px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background: white;
            text-align: center;
        }

        .summary-label {
            font-size: 11px;
            color: #666;
            display: block;
            margin-bottom: 5px;
        }

        .summary-value {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        /* List Items */
        .item-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 30px;
        }

        .list-item {
            display: flex;
            align-items: center;
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            padding: 15px;
            min-height: 50px;
        }

        .item-number {
            width: 40px;
            text-align: center;
            font-weight: 600;
            color: #666;
            border-right: 1px solid #e0e0e0;
            padding-right: 15px;
            margin-right: 15px;
        }

        .item-data {
            flex: 1;
            color: #333;
            font-size: 14px;
        }

        .item-detail {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .item-label {
            font-weight: 500;
            color: #666;
            min-width: 100px;
        }

        .item-value {
            color: #333;
        }

        /* Button */
        .btn {
            padding: 10px 20px;
            border: 1px solid #ddd;
            background: white;
            cursor: pointer;
            font-size: 14px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            color: #333;
        }

        .btn:hover {
            background: #f5f5f5;
        }

        .btn-primary {
            background: #4CAF50;
            color: white;
            border-color: #4CAF50;
        }

        .btn-primary:hover {
            background: #45a049;
        }

        /* Alert */
        .alert {
            padding: 12px 20px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #999;
        }

        .empty-state svg {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
            opacity: 0.3;
        }

        /* Controls */
        .controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            gap: 20px;
        }

        .controls .search-container {
            flex: 1;
            margin: 0;
        }

        /* Dropdown */
        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: calc(100% + 10px);
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            min-width: 250px;
            z-index: 1000;
        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-header {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
            font-weight: 600;
            color: #333;
        }

        .dropdown-item {
            padding: 12px 15px;
            border-bottom: 1px solid #f0f0f0;
            cursor: pointer;
            transition: background 0.2s;
        }

        .dropdown-item:hover {
            background: #f5f5f5;
        }

        .dropdown-item:last-child {
            border-bottom: none;
        }

        .notification-item {
            display: flex;
            gap: 10px;
            align-items: flex-start;
        }

        .notification-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #e8f5e9;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .notification-content {
            flex: 1;
        }

        .notification-title {
            font-size: 13px;
            font-weight: 500;
            color: #333;
            margin-bottom: 3px;
        }

        .notification-time {
            font-size: 11px;
            color: #999;
        }

        .profile-menu-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 15px;
            color: #333;
            text-decoration: none;
            transition: background 0.2s;
        }

        .profile-menu-item:hover {
            background: #f5f5f5;
        }

        .profile-menu-item svg {
            width: 18px;
            height: 18px;
        }

        .logout-item {
            color: #dc3545;
            border-top: 1px solid #e0e0e0;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #dc3545;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }
    </style>
    @stack('styles')
</head>
<body>

<!-- Header -->
<div class="header">
    <div class="logo-box">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>
    
    <div class="header-right">
        <!-- Notification Dropdown -->
        <div class="dropdown">
            <div style="position: relative; cursor: pointer;" id="notificationBtn">
                <svg class="notification-bell" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                <span class="notification-badge" style="display: none;"></span>
            </div>
            
            <div class="dropdown-menu" id="notificationMenu">
                <div class="dropdown-header">
                    Notifikasi
                    <a href="#" onclick="markAllRead(event)" style="float: right; font-size: 11px; color: #4CAF50; text-decoration: none;">Tandai semua dibaca</a>
                </div>
                <div id="notificationList" style="max-height: 300px; overflow-y: auto;">
                    <!-- Notifications will be loaded here -->
                    <div style="padding: 20px; text-align: center; color: #999;">
                        Memuat notifikasi...
                    </div>
                </div>
            </div>
        </div>
        
        <!-- User Profile Dropdown -->
        <div class="dropdown">
            <div class="user-profile" id="profileBtn">
                {{ strtoupper(substr(session('username', 'W'), 0, 1)) }}
            </div>
            
            <div class="dropdown-menu" id="profileMenu">
                <div class="dropdown-header">
                    {{ session('username', 'Warga') }}
                    <div style="font-size: 11px; font-weight: 400; color: #666; margin-top: 3px;">Warga</div>
                </div>
                <a href="/Warga" class="profile-menu-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>
                <a href="/warga/laporan" class="profile-menu-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Laporan Saya
                </a>
                <form action="/logout" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="profile-menu-item logout-item" style="width: 100%; border: none; background: none; text-align: left; cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Main Layout -->
<div class="main-layout">
    <!-- Sidebar -->
    <aside class="sidebar">
        <ul class="sidebar-menu">
            <li>
                <a href="/Warga" class="{{ request()->is('Warga') || request()->is('warga/dashboard') ? 'active' : '' }}" title="Home">
                    ⌂
                </a>
            </li>
            <li>
                <a href="/warga/laporan" class="{{ request()->is('warga/laporan*') ? 'active' : '' }}" title="Laporan">
                    ♻
                </a>
            </li>
        </ul>
    </aside>

    <!-- Content -->
    <main class="content">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>
</div>

@stack('scripts')

<script>
    // Notification Logic
    function fetchNotifications() {
        fetch('/notifications/unread')
            .then(response => response.json())
            .then(data => {
                // Controller returns { success: true, count: X, notifications: [...] }
                // So we must pass data.notifications array to the UI updater
                if (data.notifications) {
                    updateNotificationUI(data.notifications);
                }
            })
            .catch(error => console.error('Error fetching notifications:', error));
    }

    function updateNotificationUI(notifications) {
        const badge = document.querySelector('.notification-badge');
        const list = document.getElementById('notificationList');
        
        // Update Badge
        if (notifications.length > 0) {
            badge.style.display = 'flex';
            badge.textContent = notifications.length > 9 ? '9+' : notifications.length;
        } else {
            badge.style.display = 'none';
        }

        // Update List
        if (notifications.length === 0) {
            list.innerHTML = `
                <div style="padding: 20px; text-align: center; color: #999;">
                    Tidak ada notifikasi baru
                </div>`;
            return;
        }

        let html = '';
        notifications.forEach(notif => {
            // Tentukan icon berdasarkan type
            let icon = '';
            let color = '#4CAF50';
            
            if (notif.type === 'laporan') {
                icon = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />';
            } else if (notif.type === 'register' || notif.type === 'user') {
                 icon = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />';
                 color = '#2196F3';
            } else {
                 icon = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />';
                 color = '#FF9800';
            }

            // Hitung waktu (simple relative time)
            const date = new Date(notif.created_at);
            const now = new Date();
            const diffInSeconds = Math.floor((now - date) / 1000);
            let timeString = '';
            
            if (diffInSeconds < 60) timeString = 'Baru saja';
            else if (diffInSeconds < 3600) timeString = Math.floor(diffInSeconds / 60) + ' menit lalu';
            else if (diffInSeconds < 86400) timeString = Math.floor(diffInSeconds / 3600) + ' jam lalu';
            else timeString = Math.floor(diffInSeconds / 86400) + ' hari lalu';

            html += `
                <div class="dropdown-item" onclick="markRead(${notif.id}, '${notif.link}')">
                    <div class="notification-item">
                        <div class="notification-icon" style="background: ${color}20;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="${color}" width="20" height="20">
                                ${icon}
                            </svg>
                        </div>
                        <div class="notification-content">
                            <div class="notification-title">${notif.title}</div>
                            <div style="font-size: 12px; color: #666; margin-bottom: 2px;">${notif.message}</div>
                            <div class="notification-time">${timeString}</div>
                        </div>
                    </div>
                </div>
            `;
        });
        
        list.innerHTML = html;
    }

    // Fungsi global agar bisa dipanggil onclick
    window.markRead = function(id, link) {
        fetch(`/notifications/${id}/read`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success && link) {
                    window.location.href = link;
                } else {
                    fetchNotifications(); // Refresh list
                }
            })
            .catch(error => console.error('Error marking as read:', error));
    };

    window.markAllRead = function(e) {
        if(e) e.preventDefault();
        fetch(`/notifications/mark-all-read`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                fetchNotifications(); // Refresh list
            })
            .catch(error => console.error('Error marking all as read:', error));
    };

    // Dropdown functionality
    document.addEventListener('DOMContentLoaded', function() {
        const notificationBtn = document.getElementById('notificationBtn');
        const notificationMenu = document.getElementById('notificationMenu');
        const profileBtn = document.getElementById('profileBtn');
        const profileMenu = document.getElementById('profileMenu');

        // Initial fetch
        fetchNotifications();
        
        // Poll every 10 seconds
        setInterval(fetchNotifications, 10000);

        // Toggle notification dropdown
        notificationBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            notificationMenu.classList.toggle('show');
            profileMenu.classList.remove('show');
        });

        // Toggle profile dropdown
        profileBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            profileMenu.classList.toggle('show');
            notificationMenu.classList.remove('show');
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
        profileMenu.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });
</script>

</body>
</html>
