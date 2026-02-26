<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo e(asset('images/logo.png')); ?>" type="image/x-icon">
    <title><?php echo $__env->yieldContent('title', 'Dashboard Petugas'); ?> - Bank Sampah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }

        /* Badge Notifikasi */
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ef4444;
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
        
        .animate-slide-in {
            animation: slideIn 0.3s ease-out;
        }
        
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Dropdown custom style */
        .dropdown-menu {
             display: none;
             position: absolute;
             right: 0;
             top: 100%;
             margin-top: 0.5rem;
             width: 20rem;
             background-color: white;
             border-radius: 0.5rem;
             box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
             z-index: 50;
             border: 1px solid #e5e7eb;
        }
        .dropdown-menu.show {
            display: block;
        }
    </style>
</head>
<body class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-200 hidden md:flex flex-col">
        <div class="h-16 flex items-center justify-center border-b border-gray-200">
            <h2 class="text-xl font-bold text-indigo-600">Bank Sampah</h2>
        </div>
        
        <nav class="flex-1 overflow-y-auto py-4">
            <ul class="space-y-1 px-2">
                <li>
                    <a href="/petugas" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg <?php echo e(request()->is('petugas') ? 'bg-indigo-50 text-indigo-600' : ''); ?>">
                        <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="/petugas/datasampah" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg <?php echo e(request()->is('petugas/datasampah*') ? 'bg-indigo-50 text-indigo-600' : ''); ?>">
                        <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Data Sampah
                    </a>
                </li>
            </ul>
        </nav>
        
        <div class="p-4 border-t border-gray-200">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">
                    <?php echo e(strtoupper(substr(session('username', 'P'), 0, 1))); ?>

                </div>
                <div>
                    <div class="text-sm font-medium text-gray-900"><?php echo e(session('username', 'Petugas')); ?></div>
                    <div class="text-xs text-gray-500">Petugas</div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Header -->
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6">
            <div class="flex items-center">
               <h1 class="text-xl font-semibold text-gray-800">
                   <?php echo $__env->yieldContent('header', 'Dashboard Petugas'); ?>
               </h1>
            </div>
            
            <div class="flex items-center space-x-4">
                <!-- Notifications -->
                <div class="relative">
                    <button id="notificationBtn" class="p-2 text-gray-400 hover:text-gray-600 rounded-full hover:bg-gray-100 relative">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span class="notification-badge" style="display: none;"></span>
                    </button>
                    
                    <div id="notificationMenu" class="dropdown-menu">
                         <div class="px-4 py-3 border-b border-gray-100 flex justify-between items-center">
                            <span class="font-semibold text-gray-700">Notifikasi</span>
                            <a href="#" onclick="markAllRead(event)" class="text-xs text-indigo-600 hover:text-indigo-800">Tandai semua dibaca</a>
                        </div>
                        <div id="notificationList" class="max-h-80 overflow-y-auto">
                             <div class="p-4 text-center text-gray-500 text-sm">Memuat...</div>
                        </div>
                    </div>
                </div>
                
                <!-- Logout -->
                <form action="/logout" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition">
                        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
            <?php if(session('success')): ?>
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative animate-slide-in">
                    <span class="block sm:inline"><?php echo e(session('success')); ?></span>
                </div>
            <?php endif; ?>
            
            <?php if(session('error')): ?>
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative animate-slide-in">
                    <span class="block sm:inline"><?php echo e(session('error')); ?></span>
                </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <script>
        // Notification Logic
        function fetchNotifications() {
            fetch('/notifications/unread')
                .then(response => response.json())
                .then(data => {
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
                    <div class="p-6 text-center text-gray-500">
                        <svg class="w-10 h-10 mx-auto mb-2 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <p class="text-sm">Tidak ada notifikasi baru</p>
                    </div>`;
                return;
            }

            let html = '';
            notifications.forEach(notif => {
                let colorClass = 'text-green-500 bg-green-100';
                if (notif.type === 'register' || notif.type === 'user') colorClass = 'text-blue-500 bg-blue-100';
                if (notif.type === 'alert') colorClass = 'text-orange-500 bg-orange-100';
                
                // Simple relative time
                const date = new Date(notif.created_at);
                const now = new Date();
                const diffInSeconds = Math.floor((now - date) / 1000);
                let timeString = '';
                if (diffInSeconds < 60) timeString = 'Baru saja';
                else if (diffInSeconds < 3600) timeString = Math.floor(diffInSeconds / 60) + 'm lalu';
                else if (diffInSeconds < 86400) timeString = Math.floor(diffInSeconds / 3600) + 'j lalu';
                else timeString = Math.floor(diffInSeconds / 86400) + 'h lalu';

                html += `
                    <div onclick="markRead(${notif.id}, '${notif.link}')" class="px-4 py-3 hover:bg-gray-50 cursor-pointer border-b border-gray-50 transition">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <span class="inline-flex items-center justify-center h-8 w-8 rounded-full ${colorClass}">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </span>
                            </div>
                            <div class="ml-3 w-0 flex-1">
                                <p class="text-sm font-medium text-gray-900">${notif.title}</p>
                                <p class="text-xs text-gray-500 mt-0.5">${notif.message}</p>
                                <p class="text-xs text-gray-400 mt-1">${timeString}</p>
                            </div>
                        </div>
                    </div>
                `;
            });
            list.innerHTML = html;
        }

        window.markRead = function(id, link) {
            fetch(`/notifications/${id}/read`, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>', 'Content-Type': 'application/json' }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success && link) window.location.href = link;
                    else fetchNotifications();
                });
        };

        window.markAllRead = function(e) {
            if(e) e.preventDefault();
            fetch(`/notifications/mark-all-read`, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>', 'Content-Type': 'application/json' }
                })
                .then(() => fetchNotifications());
        };

        // UI Interactions
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('notificationBtn');
            const menu = document.getElementById('notificationMenu');
            
            fetchNotifications();
            setInterval(fetchNotifications, 10000); // Poll every 10s

            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                menu.classList.toggle('show');
            });

            document.addEventListener('click', (e) => {
                if (!btn.contains(e.target) && !menu.contains(e.target)) {
                    menu.classList.remove('show');
                }
            });
        });
    </script>
</body>
</html>
<?php /**PATH C:\laragon\www\SistemMhs_BankSampah\resources\views/layouts/petugas.blade.php ENDPATH**/ ?>