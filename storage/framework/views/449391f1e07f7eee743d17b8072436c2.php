

<?php $__env->startSection('title', 'Laporan Warga'); ?>

<?php $__env->startSection('topbar-left'); ?>
    
    <div class="relative flex-1 max-w-md">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <input 
            type="text" 
            id="searchInput"
            class="search-input block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
            placeholder="Cari laporan...">
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="animate-slide-in">
    
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Laporan Warga</h1>
        <p class="text-gray-600">Kelola semua laporan yang dikirim oleh warga</p>
    </div>

    
    <div class="mb-6 flex items-center justify-between">
        <div class="flex items-center space-x-3">
            
            <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                </svg>
                <span>Filter</span>
            </button>
            
            <a href="/Admin/laporan/cetak" target="_blank" class="px-4 py-2 bg-indigo-600 border border-transparent rounded-lg text-sm font-medium text-white hover:bg-indigo-700 transition flex items-center space-x-2 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                </svg>
                <span>Cetak</span>
            </a>
        </div>

        <div class="flex items-center space-x-2 text-sm text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
            </svg>
            <span>Total: <strong><?php echo e($laporan->count()); ?></strong> laporan</span>
        </div>
    </div>

    
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            No
                        </th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            Nama Warga
                        </th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            Jenis Sampah
                        </th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            Berat (Kg)
                        </th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            Keterangan
                        </th>
                        <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="tableBody">
                    <?php $__empty_1 = true; $__currentLoopData = $laporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="table-row">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <?php echo e($index + 1); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                                        <?php echo e(strtoupper(substr($item->nama_warga, 0, 2))); ?>

                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-semibold text-gray-900"><?php echo e($item->nama_warga); ?></div>
                                        <div class="text-xs text-gray-500">Warga</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-purple-600">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-gray-900"><?php echo e($item->jenis_sampah); ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="text-sm font-semibold text-gray-900"><?php echo e(number_format($item->berat, 2)); ?></span>
                                    <span class="ml-1 text-xs text-gray-500">Kg</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 mr-2 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                    </svg>
                                    <?php echo e(\Carbon\Carbon::parse($item->tanggal)->format('d M Y')); ?>

                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600 max-w-xs truncate" title="<?php echo e($item->keterangan); ?>">
                                    <?php echo e($item->keterangan ?? '-'); ?>

                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <div class="flex items-center justify-center space-x-2">
                                    
                                    <button 
                                        onclick="showDetail('<?php echo e($item->nama_warga); ?>', '<?php echo e($item->jenis_sampah); ?>', '<?php echo e($item->berat); ?>', '<?php echo e(\Carbon\Carbon::parse($item->tanggal)->format('d M Y')); ?>', '<?php echo e($item->keterangan); ?>')"
                                        class="action-btn p-2 bg-green-50 text-green-600 rounded-lg hover:bg-green-100 transition"
                                        title="Lihat Detail">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </button>

                                    
                                    <form action="/Admin/laporan/delete/<?php echo e($item->id); ?>" 
                                          method="POST" 
                                          class="inline-block"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" 
                                                class="action-btn p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition"
                                                title="Hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-gray-300 mb-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                    <p class="text-gray-500 text-lg font-medium mb-1">Belum ada laporan</p>
                                    <p class="text-gray-400 text-sm">Laporan dari warga akan muncul di sini</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <?php if($laporan->count() > 0): ?>
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-6">
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                        <span class="text-sm text-gray-600">Total Laporan: <span class="font-semibold text-gray-900"><?php echo e($laporan->count()); ?></span></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-indigo-500 rounded-full"></div>
                        <span class="text-sm text-gray-600">Total Berat: <span class="font-semibold text-gray-900"><?php echo e(number_format($laporan->sum('berat'), 2)); ?> Kg</span></span>
                    </div>
                </div>
                <div class="text-sm text-gray-500">
                    Menampilkan <?php echo e($laporan->count()); ?> laporan
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>


<div id="detailModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6 animate-slide-in">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-gray-900">Detail Laporan</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="space-y-4">
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase">Nama Warga</label>
                <p id="modalNama" class="text-sm font-medium text-gray-900 mt-1"></p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase">Jenis Sampah</label>
                <p id="modalJenis" class="text-sm font-medium text-gray-900 mt-1"></p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase">Berat</label>
                <p id="modalBerat" class="text-sm font-medium text-gray-900 mt-1"></p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase">Tanggal</label>
                <p id="modalTanggal" class="text-sm font-medium text-gray-900 mt-1"></p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase">Keterangan</label>
                <p id="modalKeterangan" class="text-sm text-gray-700 mt-1"></p>
            </div>
        </div>
        <button onclick="closeModal()" class="mt-6 w-full btn-primary py-2.5 text-white font-semibold rounded-lg">
            Tutup
        </button>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Search functionality
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

    // Modal functions
    function showDetail(nama, jenis, berat, tanggal, keterangan) {
        document.getElementById('modalNama').textContent = nama;
        document.getElementById('modalJenis').textContent = jenis;
        document.getElementById('modalBerat').textContent = berat + ' Kg';
        document.getElementById('modalTanggal').textContent = tanggal;
        document.getElementById('modalKeterangan').textContent = keterangan || '-';
        document.getElementById('detailModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('detailModal').classList.add('hidden');
    }

    // Close modal on outside click
    document.getElementById('detailModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\SistemMhs_BankSampah\resources\views/admin/laporan/index.blade.php ENDPATH**/ ?>