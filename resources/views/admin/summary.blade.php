<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sampah Anda</title>
    {{-- Memuat Tailwind CDN untuk memastikan styling SVG yang Anda gunakan berfungsi --}}
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

        /* --- Style Sidebar Ikon (64px) --- */
        .sidebar {
            width: 64px; /* Lebar sidebar minimalis ikon */
            background-color: #fff;
            padding: 10px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-right: 1px solid #ccc;
            height: 100vh;
            position: fixed; /* Penting agar sidebar tetap di tempatnya */
        }
        /* Mengganti .sidebar-item lama dengan styling baru */
        .sidebar a {
            padding: 8px; /* Padding untuk area klik */
            margin: 10px 0;
            border-radius: 4px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #eee;
        }
        .sidebar .top-left-box {
            width: 30px;
            height: 30px;
            border: 1px solid #333;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Konten Utama - Menyesuaikan margin dengan lebar sidebar (64px) */
        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            margin-left: 64px; /* Diatur agar konten dimulai setelah sidebar */
            width: calc(100% - 64px);
        }

        /* Header Atas */
        .header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
            border-bottom: 1px solid #ccc;
        }
        .header-item {
            margin-left: 15px;
        }
        .input-box {
            width: 100px;
            height: 25px;
            border: 1px solid #ccc;
        }

        /* Body Halaman */
        .page-body {
            padding: 30px;
            max-width: 900px;
            width: 100%;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 30px;
        }
        
        /* Kontrol dan Summary */
        .controls {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
        }
        .search-container {
            flex-grow: 1;
            margin-right: 20px;
            max-width: 500px;
        }
        .search-input {
            padding: 10px 15px;
            width: 100%;
            border: 1px solid #ccc;
            height: 40px;
            padding-left: 40px; 
            background: #fff url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zM9.5 14C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" fill="%23888888"/></svg>') no-repeat 10px center;
            background-size: 20px 20px;
        }
        .summary-box {
            width: 150px;
            height: 40px;
            border: 1px solid #ccc;
            padding: 5px;
            text-align: center;
        }
        .summary-label {
            font-size: 10px;
            display: block;
            margin-bottom: 2px;
        }

        /* Daftar Item */
        .item-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 40px;
        }
        .list-item {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            height: 50px;
            padding: 0 10px;
            background-color: #fff;
        }
        .item-number {
            width: 30px;
            text-align: center;
            font-weight: bold;
            border-right: 1px solid #ccc;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            padding-right: 10px;
        }
        .item-data {
            flex-grow: 1;
            height: 100%;
            border: none;
            padding: 0;
            line-height: 50px;
        }
        
        /* Navigasi Bawah (Ikon Panah) */
        .bottom-nav {
            display: flex;
            justify-content: flex-end;
        }
        .next-page-icon {
            font-size: 40px;
            cursor: pointer;
            color: #333;
        }
    </style>
</head>
<body>
    
    {{-- SIDEBAR IKON (Disamakan dengan tampilan Kelola Data Pengguna) --}}
    <div class="sidebar">
        <div class="top-left-box">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </div>
        
        {{-- Ikon Sampah (Kelola Data Sampah) --}}
        <a href="/petugas/kelolaDataSampah" class="p-2" title="Kelola Data Sampah">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m-1.252-.522L5.626 4.3c-.328-.327-.47-.723-.47-1.15V2.25c0-.414.336-.75.75-.75h14.5c.414 0 .75.336.75.75V3.15c0 .427-.142.823-.47 1.15l-1.928 1.928m-4.788 0z" />
            </svg>
        </a> 
        
        {{-- Ikon Jam (Histori/Summary) --}}
        <a href="/petugas/summary" class="p-2" title="Histori Transaksi">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </a>
    </div>

    <div class="main-content">
        
        <div class="header">
            <span class="header-item icon">&#x1F514;</span> 
            <div class="header-item input-box"></div> 
            <div class="header-item input-box"></div> 
            <span class="header-item profile-icon">&#x1F464;</span> 
        </div>

        <div class="page-body">
            
            <h2>Sampah Anda</h2>

            <div class="controls">
                <div class="search-container">
                    <input type="text" class="search-input" placeholder="Temukan Data Sampah">
                </div>
                
                <div class="summary-box">
                    <span class="summary-label">Total Sampah Anda</span>
                    {{-- Data Statis: Hanya placeholder --}}
                </div>
            </div>

            <div class="item-list">
                {{-- Data Statis 1 --}}
                <div class="list-item">
                    <span class="item-number">1</span>
                    <span class="item-data"></span>
                </div>
                {{-- Data Statis 2 --}}
                <div class="list-item">
                    <span class="item-number">2</span>
                    <span class="item-data"></span>
                </div>
                {{-- Data Statis 3 --}}
                <div class="list-item">
                    <span class="item-number">3</span>
                    <span class="item-data"></span>
                </div>
                {{-- Data Statis 4 --}}
                <div class="list-item">
                    <span class="item-number">4</span>
                    <span class="item-data"></span>
                </div>
                {{-- Data Statis 5 --}}
                <div class="list-item">
                    <span class="item-number">5</span>
                    <span class="item-data"></span>
                </div>
            </div>

            <div class="bottom-nav">
    <a href="/Admin/AdminLaporan" class="next-page-icon" title="Lihat Laporan">&#x2192;</a>
</div>

        </div>
    </div>

</body>
</html>