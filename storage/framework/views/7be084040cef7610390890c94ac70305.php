<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo e(asset('images/logo.png')); ?>" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Daftar Akun Baru</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f4f4f4; /* Latar belakang abu-abu muda */
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Agar konten di tengah layar vertikal */
        }

        /* Container utama di tengah */
        .register-box {
            max-width: 450px;
            width: 100%;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Bayangan yang lebih menonjol */
            text-align: center;
        }

        h3 {
            margin-top: 0;
            margin-bottom: 30px;
            color: #333;
            font-size: 1.5rem;
        }

        /* Styling Tabel Form */
        form table {
            width: 100%;
            margin: 0 auto;
            border-collapse: separate;
            border-spacing: 0 15px; /* Jarak antar baris */
        }
        form td {
            vertical-align: middle;
            padding: 0;
        }
        form label {
            display: block;
            font-weight: 500;
            color: #444;
            text-align: left;
        }

        /* Styling Input */
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box; 
        }

        /* Tombol Daftar */
        .btn {
            display: block;
            width: 100%;
            padding: 12px 20px;
            margin-top: 15px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: background-color 0.2s;
            font-size: 16px;
        }
        .btn-primary {
            background-color: #28a745; /* Hijau untuk Daftar */
            color: white;
        }
        .btn-primary:hover {
            background-color: #1e7e34;
        }

        /* Link Login */
        .login-link {
            display: block;
            margin-top: 25px;
            color: #007bff;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .login-link:hover {
            text-decoration: underline;
        }

        .logo-container {
            margin: 0 auto 30px auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo-container img {
            width: 150px;
            height: 150px;
            object-fit: contain;
        }

    </style>
</head>
<body>

<div class="register-box">
    
    <h3>Daftar Akun Baru</h3>

    <div class="logo-container">
        <img src="<?php echo e(asset('images/logo.png')); ?>?v=<?php echo e(time()); ?>" alt="Bank Sampah Logo">
    </div>

    
    <?php if(session('error')): ?>
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('success')): ?>
        <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    
   <form action="prosesDaftar" method="POST"> 
    <!-- <form action="warga/dashboard" method="POST">  -->
<!-- <form action="petugas/dashboard" method="POST">  -->
        <?php echo csrf_field(); ?>
        <table>
            <tr>
                <td style="width: 35%;">
                    <label for="nama_lengkap">Nama Lengkap</label>
                </td>
                <td style="width: 65%;">
                    <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?php echo e(old('nama_lengkap')); ?>">
                    <?php $__errorArgs = ['nama_lengkap'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div style="color: red; font-size: 12px;"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="username">Username</label>
                </td>
                <td>
                    <input type="text" id="username" name="username" value="<?php echo e(old('username')); ?>">
                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div style="color: red; font-size: 12px;"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email</label>
                </td>
                <td>
                    <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div style="color: red; font-size: 12px;"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Password</label>
                </td>
                <td>
                    <div style="position: relative;">
                        <input type="password" id="password" name="password" style="padding-right: 40px;">
                        <span id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                            <i class="fa fa-eye" style="color: #666;"></i>
                        </span>
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div style="color: red; font-size: 12px;"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </td>
            <tr>
                <td>
                    <label for="role">Daftar Sebagai</label>
                </td>
                <td>
                    <select id="role" name="role" style="width: 100%; padding: 12px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px; box-sizing: border-box; background-color: white;">
                        <option value="Warga" <?php echo e(old('role') == 'Warga' ? 'selected' : ''); ?>>Warga</option>
                        <option value="petugas" <?php echo e(old('role') == 'petugas' ? 'selected' : ''); ?>>Petugas</option>
                    </select>
                    <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div style="color: red; font-size: 12px;"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </td>
            </tr>
        </table>

        <div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        </div>
    </form>

    <div>
        <a href="/" class="login-link">Sudah punya akun? Login disini</a>
    </div>

</div>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
    
        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // toggle the eye slash icon
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html><?php /**PATH C:\laragon\www\SistemMhs_BankSampah\resources\views/daftar.blade.php ENDPATH**/ ?>