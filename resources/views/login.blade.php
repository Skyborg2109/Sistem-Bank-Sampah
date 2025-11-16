<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Sistem Pemesanan Penginapan</title>
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
        .login-box {
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
        input[type="password"] {
            width: 100%;
            padding: 12px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box; 
        }

        /* Tombol Login */
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
            background-color: #007bff;
            color: white;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Link Register */
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

    </style>
</head>
<body>

<div class="login-box">
    
    <h3>Bank Sampah</h3>

        <div style="width: 150px; height: 100px; border: 1px solid #ccc; margin: 0 auto 30px auto; background-color: #f9f9f9; display: flex; justify-content: center; align-items: center; font-size: 12px; color: #888;">        [GAMBAR]
    </div>


    <form action="Admin/dashboard" method="POST">
    <!-- <form action="petugas/dashboard" method="POST">  -->
    <!-- <form action="warga/dashboard" method="POST"> -->
        @csrf
        <table>
            <tr>
                <td style="width: 30%;">
                    <label for="username">Username</label>
                </td>
                <td style="width: 70%;">
                    <input type="text" id="username" name="username">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Password</label>
                </td>
                <td>
                    <input type="password" id="password" name="password">
                </td>
            </tr>
        </table>

        <div>
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>

    <div>
        <a href="/Daftar" class="register-link">Belum memiliki akun? Daftar sekarang</a>
    </div>

</div>
</body>
</html>