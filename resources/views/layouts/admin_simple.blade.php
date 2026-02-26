<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Bank Sampah</title>
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

        .header-btn {
            width: 100px;
            height: 35px;
            border: 1px solid #ddd;
            background: white;
            cursor: pointer;
            font-size: 14px;
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
            background: #f0f0f0;
            cursor: pointer;
        }

        /* Layout */
        .main-layout {
            display: flex;
            min-height: calc(100vh - 80px);
        }

        /* Sidebar */
        .sidebar {
            width: 230px;
            background: white;
            border-right: 1px solid #e0e0e0;
            padding: 20px 0;
            transition: all 0.3s ease;
            position: relative;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar-header {
            padding: 0 25px 20px 25px;
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar.collapsed .sidebar-header {
            padding: 0 15px 20px 15px;
            justify-content: center;
        }

        .sidebar-title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            white-space: nowrap;
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .sidebar-title {
            opacity: 0;
            display: none;
        }

        .toggle-btn {
            width: 30px;
            height: 30px;
            border: 1px solid #e0e0e0;
            background: white;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .toggle-btn:hover {
            background: #f5f5f5;
        }

        .toggle-btn svg {
            width: 18px;
            height: 18px;
            transition: transform 0.3s;
        }

        .sidebar.collapsed .toggle-btn svg {
            transform: rotate(180deg);
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 25px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
            transition: background 0.2s;
            white-space: nowrap;
        }

        .sidebar.collapsed .sidebar-menu a {
            padding: 12px 15px;
            justify-content: center;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: #f0f0f0;
        }

        .sidebar-menu .icon {
            width: 20px;
            height: 20px;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .sidebar.collapsed .sidebar-menu .icon {
            margin-right: 0;
        }

        .sidebar-menu .menu-text {
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .sidebar-menu .menu-text {
            opacity: 0;
            display: none;
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

        /* Table */
        .table-container {
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            overflow: hidden;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f9f9f9;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            padding: 12px 15px;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            color: #666;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
            color: #333;
        }

        tbody tr:hover {
            background: #fafafa;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            width: 32px;
            height: 32px;
            border: 1px solid #ddd;
            background: white;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .action-btn:hover {
            background: #f5f5f5;
        }

        .action-btn svg {
            width: 16px;
            height: 16px;
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

        /* Form */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 500;
            color: #333;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #4CAF50;
        }

        .error-message {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
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
        <svg class="notification-bell" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        
        <button class="header-btn">Button</button>
        <button class="header-btn">Button</button>
        <button class="header-btn">Button</button>
        
        <div class="user-profile">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="24" height="24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </div>
    </div>
</div>

<!-- Main Layout -->
<div class="main-layout">
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <span class="sidebar-title">Menu</span>
            <button class="toggle-btn" id="sidebarToggle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
        </div>
        
        <ul class="sidebar-menu">
            <li>
                <a href="/Admin/dashboard" class="{{ request()->is('Admin/dashboard') ? 'active' : '' }}">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="menu-text">Home</span>
                </a>
            </li>
            <li>
                <a href="/Admin/dataPengguna" class="{{ request()->is('Admin/dataPengguna*') ? 'active' : '' }}">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="menu-text">Kelola Data Pengguna</span>
                </a>
            </li>
            <li>
                <a href="/Admin/data-sampah" class="{{ request()->is('Admin/data-sampah*') ? 'active' : '' }}">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    <span class="menu-text">Kelola Data Sampah</span>
                </a>
            </li>
            <li>
                <a href="/Admin/laporan" class="{{ request()->is('Admin/laporan*') ? 'active' : '' }}">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span class="menu-text">Kelola Akun</span>
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
    // Sidebar toggle functionality
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('sidebarToggle');
        
        // Check localStorage for saved state
        const sidebarState = localStorage.getItem('sidebarCollapsed');
        if (sidebarState === 'true') {
            sidebar.classList.add('collapsed');
        }
        
        // Toggle sidebar
        toggleBtn.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
            
            // Save state to localStorage
            const isCollapsed = sidebar.classList.contains('collapsed');
            localStorage.setItem('sidebarCollapsed', isCollapsed);
        });
    });
</script>

</body>
</html>
