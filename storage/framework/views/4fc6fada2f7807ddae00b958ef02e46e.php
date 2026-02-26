<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo e(asset('images/logo.png')); ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Login - Bank Sampah</title>

    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-box {
            max-width: 450px;
            width: 100%;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h3 {
            margin-top: 0;
            margin-bottom: 30px;
            color: #333;
            font-size: 1.5rem;
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

        /* ===== FORM ===== */
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            width: 120px;
            font-weight: 600;
            color: #333;
        }

        .form-group input {
            flex: 1;
            padding: 12px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-row {
            text-align: left;
            margin-top: 20px;
        }

        .radio-group label {
            display: inline-block;
            margin-right: 15px;
            cursor: pointer;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px 20px;
            margin-top: 20px;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            font-size: 16px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .register-link {
            display: block;
            margin-top: 25px;
            color: #007bff;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .register-link:hover {
            text-decoration: underline;
        }

        .error-message {
            background: #ffdddd;
            color: #d8000c;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            border: 1px solid #c3e6cb;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 500px) {
            .form-group {
                flex-direction: column;
                align-items: flex-start;
            }

            .form-group label {
                width: 100%;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>

<div class="login-box">

    <h3>Bank Sampah Induk Turikale</h3>

    <div class="logo-container">
        <img src="<?php echo e(asset('images/logo.png')); ?>?v=<?php echo e(time()); ?>" alt="Bank Sampah Logo">
    </div>

    <?php if(session('success')): ?>
        <div class="success-message">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="error-message">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <form action="<?php echo e(url('/prosesLogin')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="username">Username</label>
            <div style="flex: 1;">
                <input type="text"
                       id="username"
                       name="username"
                       placeholder="Masukkan username"
                       value="<?php echo e(old('username')); ?>"
                       style="width: 100%; box-sizing: border-box;">
                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div style="color: #d8000c; font-size: 12px; margin-top: 5px;"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <div style="flex: 1; position: relative;">
                <input type="password"
                       id="password"
                       name="password"
                       placeholder="Masukkan password"
                       style="width: 100%; box-sizing: border-box; padding-right: 40px;">
                <span id="togglePassword" style="position: absolute; right: 10px; top: 12px; cursor: pointer;">
                    <i class="fa fa-eye" style="color: #666;"></i>
                </span>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div style="color: #d8000c; font-size: 12px; margin-top: 5px;"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="role">Login Sebagai</label>
            <div style="flex: 1;">
                <select id="role" name="role" style="width: 100%; padding: 12px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px; box-sizing: border-box; background-color: white;">
                    <option value="" disabled <?php echo e(old('role') ? '' : 'selected'); ?>>Pilih Peran Login</option>
                    <option value="admin" <?php echo e(old('role') == 'admin' ? 'selected' : ''); ?>>Admin</option>
                    <option value="petugas" <?php echo e(old('role') == 'petugas' ? 'selected' : ''); ?>>Petugas</option>
                    <option value="Warga" <?php echo e(old('role') == 'Warga' ? 'selected' : ''); ?>>Warga</option>
                </select>
                <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div style="color: #d8000c; font-size: 12px; margin-top: 5px;"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <a href="<?php echo e(url('/daftar')); ?>" class="register-link">
        Belum memiliki akun? Daftar sekarang
    </a>

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
</html><?php /**PATH C:\laragon\www\SistemMhs_BankSampah\resources\views/login.blade.php ENDPATH**/ ?>