<?php $__env->startSection('title', 'Laporan Sampah'); ?>

<?php $__env->startSection('content'); ?>
<h1 class="page-title">Laporan Bank Sampah</h1>

<div style="max-width: 600px; margin: 0 auto;">
    <div style="background: white; padding: 30px; border-radius: 4px; border: 1px solid #e0e0e0;">
        
        <form action="/warga/laporan" method="POST">
            <?php echo csrf_field(); ?>
            
            <div class="form-group">
                <label class="form-label">Nama Warga</label>
                <input type="text" class="form-input" value="<?php echo e(session('username')); ?>" readonly style="background: #f5f5f5;">
            </div>

            <div class="form-group">
                <label class="form-label">Jenis Sampah</label>
                <select name="jenis_sampah" class="form-select" required>
                    <option value="">Pilih Jenis Sampah</option>
                    <?php if(isset($jenisSampah)): ?>
                        <?php $__currentLoopData = $jenisSampah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $js): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($js->jenis_sampah); ?>" <?php echo e(old('jenis_sampah') == $js->jenis_sampah ? 'selected' : ''); ?>>
                                <?php echo e($js->jenis_sampah); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <option value="Plastik">Plastik</option>
                        <option value="Kertas">Kertas</option>
                        <option value="Logam">Logam</option>
                        <option value="Kaca">Kaca</option>
                        <option value="Organik">Organik</option>
                    <?php endif; ?>
                </select>
                <?php $__errorArgs = ['jenis_sampah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-message"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label class="form-label">Berat Sampah (Kg)</label>
                <input type="number" step="0.01" name="berat" class="form-input" placeholder="Contoh: 2.5" value="<?php echo e(old('berat')); ?>" required>
                <?php $__errorArgs = ['berat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-message"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label class="form-label">Keterangan (Opsional)</label>
                <textarea name="keterangan" class="form-textarea" placeholder="Tambahkan keterangan jika diperlukan"><?php echo e(old('keterangan')); ?></textarea>
                <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-message"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div style="display: flex; gap: 10px; justify-content: flex-end; margin-top: 30px;">
                <a href="/Warga" class="btn">Kembali</a>
                <button type="submit" class="btn btn-primary">Kirim Laporan</button>
            </div>
        </form>

    </div>

    <!-- Riwayat Laporan -->
    <?php if(isset($laporan) && $laporan->count() > 0): ?>
    <div style="margin-top: 30px;">
        <h3 style="margin-bottom: 15px; color: #333;">Riwayat Laporan Anda</h3>
        <div class="item-list">
            <?php $__currentLoopData = $laporan->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                <span class="item-value"><?php echo e(\Carbon\Carbon::parse($item->tanggal)->format('d/m/Y H:i')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php if($laporan->count() > 5): ?>
        <div style="text-align: center; margin-top: 15px;">
            <a href="/Warga" class="btn">Lihat Semua Laporan</a>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.warga', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\SistemMhs_BankSampah\resources\views/warga/laporan.blade.php ENDPATH**/ ?>