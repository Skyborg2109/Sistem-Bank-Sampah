<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Warga - Bank Sampah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 18pt;
            text-transform: uppercase;
        }
        .header p {
            margin: 5px 0;
            font-size: 11pt;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 50px;
            text-align: right;
        }
        .footer p {
            margin-bottom: 60px;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="no-print" style="margin-bottom: 20px;">
        <button onclick="window.print()" style="padding: 10px 20px; font-size: 14px; cursor: pointer;">Cetak Laporan</button>
        <button onclick="window.history.back()" style="padding: 10px 20px; font-size: 14px; cursor: pointer;">Kembali</button>
    </div>

    <div class="header">
        <h1>Laporan Data Setoran Sampah Warga</h1>
        <p>Sistem Informasi Bank Sampah</p>
        <p>Tanggal Cetak: <?php echo e(date('d F Y')); ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 15%">Tanggal</th>
                <th style="width: 20%">Nama Wares</th>
                <th style="width: 15%">Jenis Sampah</th>
                <th style="width: 10%">Berat (Kg)</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $laporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td style="text-align: center;"><?php echo e($index + 1); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($item->tanggal)->format('d-m-Y')); ?></td>
                <td><?php echo e($item->nama_warga); ?></td>
                <td><?php echo e($item->jenis_sampah); ?></td>
                <td style="text-align: right;"><?php echo e($item->berat); ?></td>
                <td><?php echo e($item->keterangan); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="6" style="text-align: center;">Tidak ada data laporan.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="footer">
        <p>Mengetahui,</p>
        <p>Admin Bank Sampah</p>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\SistemMhs_BankSampah\resources\views/admin/laporan/cetak.blade.php ENDPATH**/ ?>