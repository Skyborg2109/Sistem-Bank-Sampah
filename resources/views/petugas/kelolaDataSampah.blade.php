<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Sampah</title>
    <style>
        /* Pengaturan Dasar */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
        }

        /* Navigasi Samping (Sidebar) */
        .sidebar {
            width: 60px;
            background-color: #fff;
            padding: 10px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-right: 1px solid #ccc;
            height: 100vh; /* Tinggi penuh layar */
        }
        .sidebar-item {
            font-size: 24px;
            margin: 15px 0;
            cursor: pointer;
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .top-left-box {
            border: 1px solid #333;
            margin-bottom: 25px;
        }

        /* Konten Utama */
        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        /* Header Atas */
        .header {
            display: flex;
            justify-content: flex-end; /* Hanya bagian kanan yang penting di sini */
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
            border-bottom: 1px solid #ccc;
        }
        .header-item {
            margin-left: 15px;
        }
        .icon {
            font-size: 20px;
        }
        .input-box {
            width: 100px;
            height: 25px;
            border: 1px solid #ccc;
        }
        .profile-icon {
            font-size: 24px;
        }

        /* Body Halaman */
        .page-body {
            padding: 30px;
        }
        h2 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 30px;
        }
        
        /* Kontrol (Tombol dan Pencarian) */
        .controls {
            display: flex;
            flex-direction: column; /* Mengatur item secara vertikal */
            align-items: flex-start;
            margin-bottom: 25px;
        }
        .add-button {
            padding: 5px 10px;
            border: 1px solid #ccc;
            background-color: #fff;
            cursor: pointer;
            margin-bottom: 15px;
            font-size: 14px;
            display: flex;
            align-items: center;
        }
        .search-input {
            padding: 10px 15px;
            width: 98%;
            max-width: 600px;
            border: 1px solid #ccc;
            height: 40px;
            /* Simulasi Ikon Pencarian */
            padding-left: 40px; 
            background: #fff url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zM9.5 14C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" fill="%23888888"/></svg>') no-repeat 10px center;
            background-size: 20px 20px;
        }

        /* Tabel Data */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 8px 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #eee;
            text-transform: uppercase;
        }
        td:nth-child(1) {
            width: 40px; /* Kolom No */
            text-align: center;
        }
        td:last-child {
            width: 120px; /* Kolom Aksi */
            text-align: center;
        }
        .data-cell-box {
            height: 20px; 
            border: 1px solid #ccc;
            margin: 5px 0;
        }
        .action-icon {
            display: inline-block;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            border: 1px solid #333;
            text-align: center;
            line-height: 25px;
            margin: 0 5px;
            cursor: pointer;
            font-size: 14px;
        }
    </style>
</head>
<body>
    
    <div class="sidebar">
        <div class="sidebar-item top-left-box"></div> 
        <div class="sidebar-item">&#9776;</div> 
        <div class="sidebar-item">&#x2302;</div> 
        <div class="sidebar-item">&#x1F465;</div> 
        <div class="sidebar-item">&#x1F4CB;</div> 
    </div>

    <div class="main-content">
        
        <div class="header">
            <span class="header-item icon">&#x1F514;</span> <div class="header-item input-box"></div> <div class="header-item input-box"></div> <span class="header-item profile-icon">&#x1F464;</span> </div>

        <div class="page-body">
            
            <h2>Kelola Data Sampah</h2>

            <div class="controls">
                <button class="add-button">
                    <span style="font-size: 18px; margin-right: 5px;">+</span> 
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
                            <a class="action-icon" href="/petugas/dataSampah">&#x270E;</a>
                            <a class="action-icon" href="#">&#x1F5D1;</a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

</body>
</html>