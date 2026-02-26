<?php $__env->startSection('title', 'Data Sampah'); ?>
<?php $__env->startSection('header', 'Data Sampah'); ?>

<?php $__env->startSection('content'); ?>
<div class="animate-slide-in">
    <!-- Action Bar -->
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-xl font-bold text-gray-800">Daftar Data Sampah</h2>
        <a href="/petugas/datasampah/create" class="px-5 py-2.5 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition shadow-sm flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Data
        </a>
    </div>

    <!-- Data Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-700 uppercase font-semibold text-xs border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Jenis Sampah</th>
                        <th class="px-6 py-4">Berat (Kg)</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php $__empty_1 = true; $__currentLoopData = $sampah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 text-gray-500 font-medium"><?php echo e($loop->iteration); ?></td>
                        <td class="px-6 py-4">
                             <div class="flex items-center">
                                <span class="hidden sm:inline-block h-8 w-8 rounded-full bg-blue-100 text-blue-500 flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                </span>
                                <span class="font-medium text-gray-900"><?php echo e($s->jenis_sampah); ?></span>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-bold text-gray-800"><?php echo e(number_format($s->berat, 2)); ?></td>
                        <td class="px-6 py-4 text-sm text-gray-500"><?php echo e(\Carbon\Carbon::parse($s->tanggal)->format('d F Y')); ?></td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center space-x-3">
                                <a href="/petugas/datasampah/edit/<?php echo e($s->id); ?>" class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 p-2 rounded-lg transition" title="Edit">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="/petugas/datasampah/delete/<?php echo e($s->id); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="inline-block">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition" title="Hapus">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-400">
                                <svg class="w-12 h-12 mb-3 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                <span class="text-base font-medium">Belum ada data sampah</span>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.petugas', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\SistemMhs_BankSampah\resources\views/petugas/dataSampah.blade.php ENDPATH**/ ?>