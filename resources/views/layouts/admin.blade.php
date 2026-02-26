<!DOCTYPE html>
<html lang="id" class="{{ ($userSettings->dark_mode ?? false) ? 'dark' : '' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <title>@yield('title', 'Admin Dashboard') - Bank Sampah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        dark: {
                            bg: '#1f2937',
                            card: '#374151',
                            text: '#f3f4f6'
                        }
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .sidebar {
            width: 80px;
            transition: all 0.3s ease;
        }
        
        .sidebar.expanded {
            width: 250px;
        }
        
        .main-content {
            margin-left: 80px;
            transition: all 0.3s ease;
        }
        
        .main-content.expanded {
            margin-left: 250px;
        }
        
        .nav-icon {
            transition: all 0.2s ease;
        }
        
        .nav-icon:hover {
            transform: translateY(-2px);
        }
        
        .menu-text {
            opacity: 0;
            max-width: 0;
            overflow: hidden;
            white-space: nowrap;
            transition: all 0.3s ease;
            margin-left: 0;
        }
        
        .sidebar.expanded .menu-text {
            opacity: 1;
            max-width: 200px;
            margin-left: 12px;
        }
        
        .toggle-sidebar-btn {
            position: absolute;
            top: 20px;
            right: -12px;
            width: 24px;
            height: 24px;
            background: white;
            border: 2px solid #e5e7eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 60;
            transition: all 0.2s ease;
        }
        
        .toggle-sidebar-btn:hover {
            background: #f3f4f6;
            transform: scale(1.1);
        }
        
        .toggle-sidebar-btn svg {
            width: 12px;
            height: 12px;
            transition: transform 0.3s ease;
        }
        
        .sidebar.expanded .toggle-sidebar-btn svg {
            transform: rotate(180deg);
        }
        
        /* Apply initial state without animation */
        html.sidebar-expanded .sidebar {
            width: 250px;
        }
        
        html.sidebar-expanded .main-content {
            margin-left: 250px;
        }
        
        html.sidebar-expanded .menu-text {
            opacity: 1;
            max-width: 200px;
            margin-left: 12px;
        }
        
        html.sidebar-expanded .toggle-sidebar-btn svg {
            transform: rotate(180deg);
        }
        
        .search-input:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        .table-row {
            transition: all 0.2s ease;
        }
        
        .table-row:hover {
            background-color: #f9fafb;
            transform: scale(1.01);
        }
        
        .action-btn {
            transition: all 0.2s ease;
        }
        
        .action-btn:hover {
            transform: scale(1.1);
        }
        
        .topbar {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-slide-in {
            animation: slideIn 0.3s ease-out;
        }
        
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
        
        .notification-item:hover {
            background-color: #f9fafb;
        }
        
        .pulse-animation {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: .5;
            }
        }
    </style>
    @stack('styles')
    
    {{-- Apply sidebar state immediately to prevent flash --}}
    <script>
        // Apply saved sidebar state before page renders
        (function() {
            const sidebarState = localStorage.getItem('adminSidebarExpanded');
            if (sidebarState === 'true') {
                document.documentElement.classList.add('sidebar-expanded');
            }
        })();
    </script>
</head>
<body class="bg-gray-50">

<div class="flex h-screen overflow-hidden">

    {{-- SIDEBAR --}}
    <aside class="sidebar fixed h-full bg-white shadow-xl flex flex-col items-center py-6 z-50" id="sidebar">
        {{-- Toggle Button --}}
        <button class="toggle-sidebar-btn" id="toggleSidebar">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
        
        {{-- Logo/Brand --}}
        <div class="mb-8 p-3 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
            </svg>
        </div>

        {{-- Navigation Icons --}}
        <nav class="flex-1 flex flex-col items-center space-y-4 w-full px-3">
            {{-- Home --}}
            <a href="/Admin/dashboard" class="nav-icon p-3 rounded-xl {{ request()->is('Admin/dashboard') ? 'bg-gradient-to-br from-purple-500 to-indigo-600 text-white' : 'text-gray-600 hover:bg-gray-100' }} flex items-center w-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 flex-shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <span class="menu-text text-sm font-medium">Dashboard</span>
            </a>

            {{-- Data Pengguna --}}
            <a href="/Admin/dataPengguna" class="nav-icon p-3 rounded-xl {{ request()->is('Admin/dataPengguna*') ? 'bg-gradient-to-br from-purple-500 to-indigo-600 text-white' : 'text-gray-600 hover:bg-gray-100' }} flex items-center w-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 flex-shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
                <span class="menu-text text-sm font-medium">Data Pengguna</span>
            </a>

            {{-- Data Sampah --}}
            <a href="/Admin/data-sampah" class="nav-icon p-3 rounded-xl {{ request()->is('Admin/data-sampah*') ? 'bg-gradient-to-br from-purple-500 to-indigo-600 text-white' : 'text-gray-600 hover:bg-gray-100' }} flex items-center w-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 flex-shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                </svg>
                <span class="menu-text text-sm font-medium">Data Sampah</span>
            </a>

            {{-- Laporan --}}
            <a href="/Admin/laporan" class="nav-icon p-3 rounded-xl {{ request()->is('Admin/laporan*') ? 'bg-gradient-to-br from-purple-500 to-indigo-600 text-white' : 'text-gray-600 hover:bg-gray-100' }} flex items-center w-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 flex-shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>
                <span class="menu-text text-sm font-medium">Laporan</span>
            </a>
        </nav>

        {{-- Logout --}}
        <form action="/logout" method="POST" class="mt-auto w-full px-3">
            @csrf
            <button type="submit" class="nav-icon p-3 rounded-xl text-red-500 hover:bg-red-50 flex items-center w-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 flex-shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                </svg>
                <span class="menu-text text-sm font-medium">Logout</span>
            </button>
        </form>
    </aside>

    {{-- MAIN CONTENT --}}
    <div class="main-content flex-1 flex flex-col overflow-hidden" id="mainContent">
        
        {{-- TOP BAR --}}
        <header class="topbar sticky top-0 z-40 px-8 py-4 shadow-sm border-b border-gray-200">
            <div class="flex items-center justify-between">
                {{-- Search & Filters (Left Side) --}}
                <div class="flex items-center space-x-4 flex-1">
                    @yield('topbar-left')
                </div>

                {{-- Right Side Actions --}}
                <div class="flex items-center space-x-4">
                    {{-- Notification Bell --}}
                    <div class="dropdown">
                        <button id="notificationBtn" class="relative p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.434-1.59A6 6 0 1012 3.75a6.006 6.006 0 006.291 6.002c.395.055.791.1 1.188.137M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15" />
                            </svg>
                            <span id="notificationBadge" class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full pulse-animation" style="display: none;"></span>
                        </button>
                        
                        {{-- Notification Dropdown --}}
                        <div id="notificationMenu" class="dropdown-menu">
                            <div class="p-4 border-b border-gray-200">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-lg font-bold text-gray-900">Notifikasi</h3>
                                    <span id="notificationCount" class="px-2 py-1 bg-red-100 text-red-600 text-xs font-semibold rounded-full">0</span>
                                </div>
                            </div>
                            <div id="notificationList" class="max-h-96 overflow-y-auto">
                                {{-- Notifications will be loaded here dynamically --}}
                                <div class="p-8 text-center text-gray-500">
                                    <svg class="w-12 h-12 mx-auto mb-2 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                    <p class="text-sm">Memuat notifikasi...</p>
                                </div>
                            </div>
                            <div class="p-3 border-t border-gray-200">
                                <button onclick="markAllAsRead()" class="block w-full text-center text-sm font-semibold text-purple-600 hover:text-purple-700">
                                    Tandai Semua Dibaca
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- User Profile --}}
                    <div class="dropdown">
                        <button id="profileBtn" class="flex items-center space-x-3 px-3 py-2 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
                            <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                {{ strtoupper(substr(session('username', 'A'), 0, 1)) }}
                            </div>
                            <div class="hidden md:block">
                                <p class="text-sm font-semibold text-gray-800">{{ session('username', 'Admin') }}</p>
                                <p class="text-xs text-gray-500">{{ ucfirst(session('role', 'admin')) }}</p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-gray-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        
                        {{-- Profile Dropdown --}}
                        <div id="profileMenu" class="dropdown-menu" style="min-width: 16rem;">
                            <div class="p-4 border-b border-gray-200">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        {{ strtoupper(substr(session('username', 'A'), 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900">{{ session('username', 'Admin') }}</p>
                                        <p class="text-xs text-gray-500">{{ session('role', 'admin') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2">
                                <a href="/Admin/dashboard" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-3 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>
                                    Dashboard
                                </a>
                                <a href="/admin/profile" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-3 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    Profil Saya
                                </a>
                                <a href="/admin/settings" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-3 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Pengaturan
                                </a>
                            </div>
                            <div class="border-t border-gray-200 py-2">
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- PAGE CONTENT --}}
        <main class="flex-1 overflow-y-auto p-8 bg-gray-50">
            @if(session('success'))
                <div class="animate-slide-in mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-green-700 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="animate-slide-in mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-red-700 font-medium">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')

<script>
    // Dropdown functionality
    document.addEventListener('DOMContentLoaded', function() {
        const notificationBtn = document.getElementById('notificationBtn');
        const notificationMenu = document.getElementById('notificationMenu');
        const profileBtn = document.getElementById('profileBtn');
        const profileMenu = document.getElementById('profileMenu');

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

        // Sidebar toggle functionality
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const toggleBtn = document.getElementById('toggleSidebar');
        const htmlElement = document.documentElement;
        
        // Check if sidebar should be expanded from localStorage
        const sidebarState = localStorage.getItem('adminSidebarExpanded');
        if (sidebarState === 'true') {
            sidebar.classList.add('expanded');
            mainContent.classList.add('expanded');
        }
        
        // Toggle sidebar
        toggleBtn.addEventListener('click', function() {
            const isExpanding = !sidebar.classList.contains('expanded');
            
            sidebar.classList.toggle('expanded');
            mainContent.classList.toggle('expanded');
            
            if (isExpanding) {
                htmlElement.classList.add('sidebar-expanded');
            } else {
                htmlElement.classList.remove('sidebar-expanded');
            }
            
            // Save state to localStorage
            localStorage.setItem('adminSidebarExpanded', isExpanding);
        });

        // ===== REAL-TIME NOTIFICATIONS =====
        let notificationInterval;
        
        // Function to fetch notifications
        function fetchNotifications() {
            fetch('/notifications/unread')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateNotificationUI(data.count, data.notifications);
                    }
                })
                .catch(error => console.error('Error fetching notifications:', error));
        }
        
        // Function to update notification UI
        function updateNotificationUI(count, notifications) {
            const badge = document.getElementById('notificationBadge');
            const countSpan = document.getElementById('notificationCount');
            const listDiv = document.getElementById('notificationList');
            
            // Update badge
            if (count > 0) {
                badge.style.display = 'block';
                countSpan.textContent = count;
            } else {
                badge.style.display = 'none';
                countSpan.textContent = '0';
            }
            
            // Update notification list
            if (notifications.length === 0) {
                listDiv.innerHTML = `
                    <div class="p-8 text-center text-gray-500">
                        <svg class="w-12 h-12 mx-auto mb-2 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <p class="text-sm">Tidak ada notifikasi baru</p>
                    </div>
                `;
            } else {
                listDiv.innerHTML = notifications.map(notif => `
                    <a href="${notif.link || '#'}" onclick="markAsRead(${notif.id})" class="notification-item block px-4 py-3 border-b border-gray-100 transition hover:bg-gray-50">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0 w-10 h-10 ${getIconBgClass(notif.type)} rounded-full flex items-center justify-center">
                                ${getIconSVG(notif.type)}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900">${notif.title}</p>
                                <p class="text-xs text-gray-500 mt-1">${notif.message}</p>
                                <p class="text-xs text-gray-400 mt-1">${notif.time}</p>
                            </div>
                            <span class="flex-shrink-0 w-2 h-2 ${getIconColor(notif.type)} rounded-full"></span>
                        </div>
                    </a>
                `).join('');
            }
        }
        
        // Helper functions for icons
        function getIconBgClass(type) {
            const classes = {
                'user_baru': 'bg-blue-100',
                'sampah_baru': 'bg-green-100',
                'laporan': 'bg-purple-100',
                'default': 'bg-gray-100'
            };
            return classes[type] || classes.default;
        }
        
        function getIconColor(type) {
            const colors = {
                'user_baru': 'bg-blue-500',
                'sampah_baru': 'bg-green-500',
                'laporan': 'bg-purple-500',
                'default': 'bg-gray-500'
            };
            return colors[type] || colors.default;
        }
        
        function getIconSVG(type) {
            const icons = {
                'user_baru': '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-blue-600"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>',
                'sampah_baru': '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-green-600"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" /></svg>',
                'laporan': '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-purple-600"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg>',
                'default': '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-600"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>'
            };
            return icons[type] || icons.default;
        }
        
        // Mark notification as read
        window.markAsRead = function(id) {
            fetch(`/notifications/${id}/read`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(() => fetchNotifications());
        };
        
        // Mark all as read
        window.markAllAsRead = function() {
            fetch('/notifications/mark-all-read', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(() => fetchNotifications());
        };
        
        // Initial fetch
        fetchNotifications();
        
        // Poll every 10 seconds
        notificationInterval = setInterval(fetchNotifications, 10000);
    });
</script>
</body>
</html>
