<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Bank Sampah</title>
    <style>
        /* Pengaturan Dasar */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
        }

        /* Navigasi Samping (Sidebar) - Konsisten dengan halaman sebelumnya */
        .sidebar {
            width: 60px; 
            background-color: #fff;
            padding: 10px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-right: 1px solid #ccc;
            height: 100vh;
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
            justify-content: flex-end;
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

        /* Body Halaman dan Kartu Formulir */
        .page-body {
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }
        .form-card {
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        h2 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 30px;
        }
        
        /* Formulir */
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"], textarea {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            height: 40px;
        }
        textarea {
            height: 150px;
            resize: vertical;
            margin-bottom: 40px;
        }
        .row-group {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        .row-group input[type="text"] {
            flex-grow: 1;
            width: 100%;
            margin-bottom: 0;
        }
        
        /* Tombol Cetak */
        .button-wrapper {
            display: flex;
            justify-content: flex-end;
        }
        button {
            padding: 10px 20px;
            border: 1px solid #ccc;
            cursor: pointer;
            font-size: 16px;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    {{--  --}}

    <div class="main-content">
        
        <div class="header">
            <span class="header-item icon">&#x1F514;</span>
            <div class="header-item input-box"></div>
            <div class="header-item input-box"></div> 
            <a href="/" class="header-item profile-icon">&#x1F464;</a>
        </div>

        <div class="page-body">
            <div class="form-card">
                
                <h2>Laporan Bank Sampah</h2>

                <form action="/warga/dashboard" method="post">
                    @csrf
                    <input type="text" placeholder="Input Data 1">

                    <input type="text" placeholder="Input Data 2">

                    <div class="row-group">
                        <input type="text" placeholder="Input Data 3">
                        <input type="text" placeholder="Input Data 4">
                    </div>

                    <textarea placeholder="Hasil Laporan / Pratinjau"></textarea>

                    <div class="button-wrapper">
                        <button type="submit" style="background-color: #007bff; color: white; border: none;">
                            <span style="margin-right: 5px;">&#x1F5A8;</span> <span>Cetak</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>
</html>