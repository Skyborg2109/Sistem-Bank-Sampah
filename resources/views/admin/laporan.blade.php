<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Bank Sampah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
        }

        .sidebar {
            width: 64px;
            background-color: #fff;
            padding: 10px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-right: 1px solid #ccc;
            height: 100vh;
            position: fixed;
        }
        .sidebar a {
            padding: 8px;
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
        .top-left-box {
            width: 30px;
            height: 30px;
            border: 1px solid #333;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            margin-left: 64px;
            width: calc(100% - 64px);
        }

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
        .input-box {
            width: 100px;
            height: 25px;
            border: 1px solid #ccc;
        }
        .profile-icon {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 1px solid #ccc;
        }

        .page-body {
            padding: 30px;
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 30px;
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .report-form-container {
            background-color: #fff;
            padding: 40px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .form-input-full {
            width: 100%;
            height: 40px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }
        .form-input-half {
            width: 48%;
            height: 40px;
            border: 1px solid #ccc;
        }
        .form-row-split {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .form-textarea {
            width: 100%;
            height: 200px; 
            border: 1px solid #ccc;
            margin-bottom: 40px;
            resize: none;
        }
        .print-button {
            position: absolute;
            bottom: 40px;
            right: 40px;
            padding: 8px 15px;
            border: 1px solid #ccc;
            background-color: #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            font-size: 14px;
        }
        .print-button svg {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="top-left-box">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </div>
        
        {{-- Ikon Home (Home/Dashboard) --}}
        <a href="/Admin/dashboard" class="p-2" title="Home">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12l8.955-8.955c.421-.421 1.1-.421 1.522 0l8.955 8.955A.75.75 0 0121 12.75H3a.75.75 0 01-.75-.75z" />
            </svg>
        </a> 
        
        {{-- Ikon Grup (Kelola Data Pengguna) --}}
        <a href="/Admin/dataPengguna" class="p-2" title="Kelola Data Pengguna">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.5z" />
            </svg>
        </a>
       
    </div>

    <div class="main-content">
        
        <div class="header">
            <span class="header-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.47-2.31 4.755 4.755 0 00-4.646-7.85z" />
                </svg>
            </span> 
            <div class="header-item input-box"></div> 
            <div class="header-item input-box"></div> 
            <div class="header-item profile-icon"></div> 
        </div>

        <div class="page-body">
            
            <h2>Laporan Bank Sampah</h2>

            <div class="report-form-container">
                <form action="/Admin/dashboard" method="POST">
                    @csrf
                    
                    {{-- Input 1 (Baris Penuh) --}}
                    <input type="text" class="form-input-full" placeholder="Input Data Laporan 1">
                    
                    {{-- Input 2 (Baris Penuh) --}}
                    <input type="text" class="form-input-full" placeholder="Input Data Laporan 2">
                    
                    {{-- Input 3 & 4 (Dibagi Dua) --}}
                    <div class="form-row-split">
                        <input type="text" class="form-input-half" placeholder="Input Data Laporan 3">
                        <input type="text" class="form-input-half" placeholder="Input Data Laporan 4">
                    </div>

                    {{-- Textarea (Kotak Besar) --}}
                    <textarea class="form-textarea" placeholder="Area Input Deskripsi Laporan"></textarea>

                    {{-- Tombol Cetak --}}
                    <button type="submit" class="print-button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.06l.75 1.77A3.375 3.375 0 009.688 16.5h4.625a3.375 3.375 0 003.215-2.23l.75-1.77M9.75 12h.008v.008H9.75V12zm-3 0h.008v.008H6.75V12zm3 0h.008v.008h-.008V12zm3 0h.008v.008h-.008V12z" />
                        </svg>
                        Cetak
                    </button>
                </form>
            </div>

        </div>
    </div>

</body>
</html>