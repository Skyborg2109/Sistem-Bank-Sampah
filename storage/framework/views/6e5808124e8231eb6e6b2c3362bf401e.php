<?php $__env->startSection('title', 'Dashboard Admin'); ?>

<?php $__env->startSection('topbar-left'); ?>
    <div class="flex items-center space-x-3">
        <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="animate-slide-in">
    
    <div class="mb-8 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-2xl shadow-xl p-8 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2">Selamat Datang, <?php echo e(session('username', 'Admin')); ?>! 👋</h1>
                <p class="text-purple-100 text-lg">Kelola sistem Bank Sampah dengan mudah dan efisien</p>
            </div>
            <div class="hidden lg:block">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-32 h-32 opacity-20">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                </svg>
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500 hover:shadow-xl transition transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Total Data Sampah</p>
                    <p class="text-3xl font-bold text-gray-900"><?php echo e(DB::table('data_sampah')->count()); ?></p>
                    <p class="text-xs text-green-600 mt-2">↑ Data terdaftar</p>
                </div>
                <div class="p-3 bg-purple-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-purple-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                    </svg>
                </div>
            </div>
        </div>

        
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500 hover:shadow-xl transition transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Total Pengguna</p>
                    <p class="text-3xl font-bold text-gray-900"><?php echo e(DB::table('data_user_tabel')->count()); ?></p>
                    <p class="text-xs text-blue-600 mt-2">↑ Pengguna aktif</p>
                </div>
                <div class="p-3 bg-blue-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-blue-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                </div>
            </div>
        </div>

        
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500 hover:shadow-xl transition transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Total Laporan</p>
                    <p class="text-3xl font-bold text-gray-900"><?php echo e(DB::table('laporan')->count()); ?></p>
                    <p class="text-xs text-green-600 mt-2">↑ Laporan masuk</p>
                </div>
                <div class="p-3 bg-green-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-green-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                </div>
            </div>
        </div>

        
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-orange-500 hover:shadow-xl transition transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Total Berat</p>
                    <p class="text-3xl font-bold text-gray-900"><?php echo e(number_format(DB::table('data_sampah')->sum('berat'), 1)); ?></p>
                    <p class="text-xs text-orange-600 mt-2">Kilogram (Kg)</p>
                </div>
                <div class="p-3 bg-orange-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-orange-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0012 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 01-2.031.352 5.988 5.988 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 01-2.031.352 5.989 5.989 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-2 text-purple-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                </svg>
                Aksi Cepat
            </h3>
            <div class="space-y-3">
                <a href="/Admin/data-sampah" class="flex items-center justify-between p-4 bg-gradient-to-r from-purple-50 to-indigo-50 rounded-lg hover:from-purple-100 hover:to-indigo-100 transition group">
                    <div class="flex items-center">
                        <div class="p-2 bg-white rounded-lg mr-3 group-hover:scale-110 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-purple-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                            </svg>
                        </div>
                        <span class="font-semibold text-gray-900">Kelola Data Sampah</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-400 group-hover:text-purple-600 group-hover:translate-x-1 transition">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </a>

                <a href="/Admin/dataPengguna" class="flex items-center justify-between p-4 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-lg hover:from-blue-100 hover:to-cyan-100 transition group">
                    <div class="flex items-center">
                        <div class="p-2 bg-white rounded-lg mr-3 group-hover:scale-110 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-blue-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                        </div>
                        <span class="font-semibold text-gray-900">Kelola Pengguna</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-400 group-hover:text-blue-600 group-hover:translate-x-1 transition">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </a>

                <a href="/Admin/laporan" class="flex items-center justify-between p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg hover:from-green-100 hover:to-emerald-100 transition group">
                    <div class="flex items-center">
                        <div class="p-2 bg-white rounded-lg mr-3 group-hover:scale-110 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-green-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                        </div>
                        <span class="font-semibold text-gray-900">Lihat Laporan</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-400 group-hover:text-green-600 group-hover:translate-x-1 transition">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
            </div>
        </div>

        
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-2 text-purple-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Aktivitas Terbaru
            </h3>
            <div class="space-y-4">
                <?php
                    $recentSampah = DB::table('data_sampah')->orderBy('created_at', 'desc')->limit(5)->get();
                ?>
                <?php $__empty_1 = true; $__currentLoopData = $recentSampah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="flex items-start space-x-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                    <div class="flex-shrink-0 w-2 h-2 bg-purple-500 rounded-full mt-2"></div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">
                            Data sampah <span class="text-purple-600"><?php echo e($item->jenis_sampah); ?></span> ditambahkan
                        </p>
                        <p class="text-xs text-gray-500">
                            <?php echo e(\Carbon\Carbon::parse($item->created_at)->diffForHumans()); ?>

                        </p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-center py-8 text-gray-400">
                    <p>Belum ada aktivitas</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\SistemMhs_BankSampah\resources\views/admin/index.blade.php ENDPATH**/ ?>