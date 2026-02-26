<?php $__env->startSection('title', 'Dashboard Petugas'); ?>
<?php $__env->startSection('header', 'Overview'); ?>

<?php $__env->startSection('content'); ?>
<div class="animate-slide-in">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-8">
        <!-- Total Data -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center">
            <div class="p-4 bg-indigo-50 rounded-lg text-indigo-600 mr-4">
                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Transaksi</p>
                <p class="text-2xl font-bold text-gray-800"><?php echo e($totalData); ?></p>
            </div>
        </div>

        <!-- Total Berat -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center">
             <div class="p-4 bg-green-50 rounded-lg text-green-600 mr-4">
                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Berat Sampah</p>
                <p class="text-2xl font-bold text-gray-800"><?php echo e(number_format($totalBerat, 2)); ?> <span class="text-sm text-gray-500 font-normal">Kg</span></p>
            </div>
        </div>
    </div>

    <!-- Recent Data Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center">
            <h3 class="text-lg font-semibold text-gray-800">Riwayat Setoran Sampah Terakhir</h3>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-600 text-xs uppercase font-semibold">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Jenis Sampah</th>
                        <th class="px-6 py-3">Berat (Kg)</th>
                        <th class="px-6 py-3">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php $__empty_1 = true; $__currentLoopData = $sampah->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-gray-500 font-medium"><?php echo e($loop->iteration); ?></td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                <?php echo e($s->jenis_sampah); ?>

                            </span>
                        </td>
                        <td class="px-6 py-4 font-bold text-gray-800"><?php echo e(number_format($s->berat, 2)); ?></td>
                        <td class="px-6 py-4 text-sm text-gray-500"><?php echo e(\Carbon\Carbon::parse($s->tanggal)->format('d M Y')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="px-6 py-10 text-center text-gray-400">Belum ada data sampah.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <?php if($sampah->count() > 10): ?>
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 flex justify-center">
            <a href="/petugas/datasampah" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">
                Lihat semua data &rarr;
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.petugas', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\SistemMhs_BankSampah\resources\views/petugas/index.blade.php ENDPATH**/ ?>