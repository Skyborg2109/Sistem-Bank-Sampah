<?php $__env->startSection('title', 'Sampah Anda'); ?>

<?php $__env->startSection('content'); ?>
<h1 class="page-title">Sampah Anda</h1>

<!-- Controls: Search and Summary -->
<div class="controls">
    <div class="search-container">
        <input type="text" id="searchInput" class="search-input" placeholder="🔍 Temukan Data Sampah">
    </div>
    
    <div class="summary-box">
        <span class="summary-label">Total Sampah Anda</span>
        <span class="summary-value"><?php echo e(number_format($totalBerat ?? 0, 2)); ?> Kg</span>
    </div>
</div>

<!-- List Items -->
<div class="item-list" id="itemList">
    <?php $__empty_1 = true; $__currentLoopData = $laporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="list-item">
            <span class="item-number"><?php echo e($index + 1); ?></span>
            <div class="item-data">
                <div class="item-detail">
                    <div>
                        <span class="item-label">Jenis:</span>
                        <span class="item-value"><?php echo e($item->jenis_sampah); ?></span>
                    </div>
                    <div>
                        <span class="item-label">Berat:</span>
                        <span class="item-value"><?php echo e(number_format($item->berat, 2)); ?> Kg</span>
                    </div>
                    <div>
                        <span class="item-label">Tanggal:</span>
                        <span class="item-value"><?php echo e(\Carbon\Carbon::parse($item->tanggal)->format('d/m/Y')); ?></span>
                    </div>
                    <?php if($item->keterangan): ?>
                    <div>
                        <span class="item-label">Keterangan:</span>
                        <span class="item-value"><?php echo e($item->keterangan); ?></span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="empty-state">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            <h3 style="margin-bottom: 10px; color: #666;">Belum Ada Laporan Sampah</h3>
            <p style="margin-bottom: 20px;">Mulai laporkan sampah Anda untuk berkontribusi pada lingkungan</p>
            <a href="/warga/laporan" class="btn btn-primary">Buat Laporan</a>
        </div>
    <?php endif; ?>
</div>

<?php if($laporan->count() > 0): ?>
<div style="margin-top: 20px; text-align: center;">
    <a href="/warga/laporan" class="btn btn-primary">+ Tambah Laporan Baru</a>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Search functionality
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const items = document.querySelectorAll('.list-item');
        
        items.forEach(item => {
            const text = item.textContent.toLowerCase();
            if (text.includes(searchValue)) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.warga', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\SistemMhs_BankSampah\resources\views/warga/index.blade.php ENDPATH**/ ?>