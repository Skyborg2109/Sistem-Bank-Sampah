<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Pengguna</title>
    {{-- Karena Anda menyediakan style SVG yang terlihat seperti Tailwind, saya akan menyertakan Tailwind CDN agar ikon SVG berfungsi dengan baik dan mendapatkan styling yang sesuai dengan konteks Anda. --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Pengaturan Dasar */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
        }

        /* --- Style Tambahan untuk Sidebar Minimalis Baru --- */
        /* Catatan: Sebagian besar styling sidebar diatur oleh class Tailwind (fixed, w-full, dll) */
        .sidebar {
            width: 64px; /* Sesuaikan lebar dengan sidebar ikon minimalis */
        }
        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            margin-left: 64px; /* Sesuaikan margin agar konten dimulai setelah sidebar */
            min-height: 100vh;
        }
        /* Style untuk meniru menu aktif (untuk a href dataPengguna) */
        .sidebar a[href="/Admin/dataPengguna"] {
            background-color: #e5e7eb; /* bg-gray-200 */
            position: relative;
        }
        .sidebar a[href="/Admin/dataPengguna"]::after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px; /* Indikator aktif */
            background-color: #007bff; /* Warna biru */
        }
        /* ------------------------------------------------ */

        /* Header Atas */
        .header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
            border-bottom: 1px solid #ccc;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        .header-item {
            margin-left: 15px;
        }
        /* Mengganti ikon placeholder lama dengan kotak berbingkai */
        .input-box {
            width: 100px;
            height: 25px;
            border: 1px solid #ccc;
        }
        .icon {
            font-size: 20px;
            /* Placeholder untuk notifikasi */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .profile-icon {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 1px solid #ccc;
        }

        /* Body Halaman */
        .page-body {
            padding: 30px;
            max-width: 1000px; /* Batasi lebar konten agar rapi */
            margin: 0 auto;
            width: 100%;
        }
        h2 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 30px;
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }
        
        /* Kontrol (Tombol dan Pencarian) */
        .controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        .add-button {
            padding: 5px 10px;
            border: 1px solid #ccc;
            background-color: #fff;
            cursor: pointer;
            font-size: 14px;
            display: flex;
            align-items: center;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            border-radius: 4px;
        }
        .search-input {
            padding: 10px 15px;
            flex-grow: 1;
            margin-left: 15px; /* Jarak dari tombol tambah */
            max-width: 400px;
            border: 1px solid #ccc;
            height: 35px;
            border-radius: 4px;
            padding-left: 40px;
            /* Icon pencarian disematkan di CSS */
            background: #fff url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zM9.5 14C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" fill="%23888888"/></svg>') no-repeat 10px center;
            background-size: 20px 20px;
        }

        /* Tabel Data */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 10px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f0f0f0;
            text-transform: uppercase;
            font-size: 0.75rem;
            color: #555;
        }
        td:nth-child(1) {
            width: 40px;
            text-align: center;
        }
        td:last-child {
            width: 120px;
            text-align: center;
        }
        .data-cell-box {
            height: 20px; 
            border: 1px solid #ccc;
            margin: 2px 0;
            border-radius: 3px;
        }
        .action-icon {
            display: inline-flex;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            border: 1px solid #333;
            align-items: center;
            justify-content: center;
            margin: 0 5px;
            cursor: pointer;
            font-size: 14px;
        }
    </style>
</head>
<body>
    
    {{-- SIDEBAR BARU (Menggunakan format yang Anda berikan, dengan ikon SVG) --}}
    <div class="sidebar fixed h-full bg-white shadow-xl flex flex-col items-center py-4">
        <div class="w-8 h-8 border border-gray-400 mb-8 flex items-center justify-center text-gray-500">
            {{-- Placeholder untuk Ikon Menu (Garis Tiga) --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </div>
        <a href="/Admin/dashboard" class="p-2 mb-4 hover:bg-gray-200 rounded">
            {{-- Placeholder untuk Ikon Beranda --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12l8.955-8.955c.421-.421 1.1-.421 1.522 0l8.955 8.955A.75.75 0 0121 12.75H3a.75.75 0 01-.75-.75z" />
            </svg>
        </a>
        <a href="/Admin/dataPengguna" class="p-2 mb-4 hover:bg-gray-200 rounded">
            {{-- Placeholder untuk Ikon Anggota/Grup (Menu Aktif: Kelola Data Pengguna) --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.5z" />
            </svg>
        </a>
        <a href="#" class="p-2 hover:bg-gray-200 rounded">
            {{-- Placeholder untuk Ikon Pengguna (Kelola Akun) --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0z" />
            </svg>
        </a>
    </div>

    {{-- Konten Utama --}}
    <div class="main-content">
        
        <div class="header">
            {{-- Notifikasi --}}
            <span class="header-item icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.47-2.31 4.755 4.755 0 00-4.646-7.85z" />
                </svg>
            </span> 
            
            {{-- Input Box 1 --}}
            <div class="header-item input-box"></div> 
            
            {{-- Input Box 2 --}}
            <div class="header-item input-box"></div> 
            
            {{-- Profile Icon --}}
            <span class="header-item profile-icon"></span> 
        </div>

        <div class="page-body">
            
            <h2>Kelola Data Pengguna</h2>

            <div class="controls">
                <button class="add-button">
                    <span style="font-size: 18px; line-height: 1; margin-right: 5px;">+</span> 
                    <span>Tambah Sampah</span>
                </button>
                
                <input type="text" class="search-input" placeholder="Temukan Data Sampah">
            </div>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>text</th>
                        <th>text</th>
                        <th>text</th>
                        <th>text</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><div class="data-cell-box"></div></td>
                        <td><div class="data-cell-box"></div></td>
                        <td><div class="data-cell-box"></div></td>
                        <td><div class="data-cell-box"></div></td>
                        <td>
                            <span class="action-icon">&#x270E;</span> 
                            <span class="action-icon">&#x1F5D1;</span> 
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><div class="data-cell-box"></div></td>
                        <td><div class="data-cell-box"></div></td>
                        <td><div class="data-cell-box"></div></td>
                        <td><div class="data-cell-box"></div></td>
                        <td>
                            <span class="action-icon">&#x270E;</span>
                            <span class="action-icon">&#x1F5D1;</span>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><div class="data-cell-box"></div></td>
                        <td><div class="data-cell-box"></div></td>
                        <td><div class="data-cell-box"></div></td>
                        <td><div class="data-cell-box"></div></td>
                        <td>
                            <span class="action-icon">&#x270E;</span>
                            <span class="action-icon">&#x1F5D1;</span>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><div class="data-cell-box"></div></td>
                        <td><div class="data-cell-box"></div></td>
                        <td><div class="data-cell-box"></div></td>
                        <td><div class="data-cell-box"></div></td>
                        <td>
                            <span class="action-icon">&#x270E;</span>
                            <span class="action-icon">&#x1F5D1;</span>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><div class="data-cell-box"></div></td>
                        <td><div class="data-cell-box"></div></td>
                        <td><div class="data-cell-box"></div></td>
                        <td><div class="data-cell-box"></div></td>
                        <td>
                            <span class="action-icon">&#x270E;</span>
                            <span class="action-icon">&#x1F5D1;</span>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

</body>
</html>