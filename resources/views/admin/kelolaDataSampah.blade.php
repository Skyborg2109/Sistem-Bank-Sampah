<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Sampah</title>
    {{-- Saya asumsikan Anda menggunakan Tailwind CSS untuk styling minimal --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Gaya tambahan untuk sidebar dan layout sederhana */
        .sidebar {
            width: 64px;
        }
        .main-content {
            margin-left: 64px;
        }
    </style>
</head>
<body class="bg-gray-100">

    {{-- Layout Sederhana --}}
    <div class="flex h-screen">

        {{-- Sidebar (Menu Samping) - Dipertahankan dari tampilan sebelumnya --}}
        <div class="sidebar fixed h-full bg-white shadow-xl flex flex-col items-center py-4">
            <div class="w-8 h-8 border border-gray-400 mb-8 flex items-center justify-center text-gray-500">
                {{-- Placeholder untuk Ikon Menu --}}
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
                {{-- Placeholder untuk Ikon Anggota/Grup --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.5z" />
                </svg>
            </a>
            <a href="#" class="p-2 hover:bg-gray-200 rounded">
                {{-- Placeholder untuk Ikon Pengguna --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0z" />
                </svg>
            </a>
        </div>

        {{-- Konten Utama --}}
        <div class="main-content flex-1 p-6 transition-all duration-300">
            
            {{-- Header/Navbar Atas - Dipertahankan dari tampilan sebelumnya --}}
            <header class="flex justify-end items-center bg-white p-4 shadow-sm rounded mb-6">
                {{-- Placeholder untuk Kotak Notifikasi --}}
                <div class="w-8 h-8 border border-gray-300 rounded-full mr-4 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.47-2.31 4.755 4.755 0 00-4.646-7.85z" />
                    </svg>
                </div>
                {{-- Placeholder untuk Kotak Input --}}
                <input type="text" class="px-3 py-1 border border-gray-300 rounded-md mr-4" placeholder="Input">
                {{-- Placeholder untuk Kotak Input --}}
                <input type="text" class="px-3 py-1 border border-gray-300 rounded-md mr-4" placeholder="Input">
                {{-- Placeholder untuk Profil Pengguna --}}
                <div class="w-8 h-8 border border-gray-300 rounded-full"></div>
            </header>

            {{-- Form Konten --}}
            <div class="bg-white shadow-md rounded-lg p-8 max-w-2xl mx-auto">
                <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Data sampah</h1>
                
                <form action="/Admin/dashboard" method="POST">
                    @csrf 
                    {{-- Input 1 (Baris Penuh) --}}
                    <div class="mb-4">
                        <input type="text" class="w-full px-4 py-2 border border-gray-400 rounded-md focus:outline-none" placeholder="Input Data 1">
                    </div>

                    {{-- Input 2 (Baris Penuh) --}}
                    <div class="mb-4">
                        <input type="text" class="w-full px-4 py-2 border border-gray-400 rounded-md focus:outline-none" placeholder="Input Data 2">
                    </div>
                    
                    {{-- Input 3 & Select (Satu Baris dibagi Dua) --}}
                    <div class="flex mb-4 space-x-4">
                        {{-- Dropdown (Select) --}}
                        <div class="w-1/3">
                            <select class="w-full px-4 py-2 border border-gray-400 rounded-md bg-white focus:outline-none">
                                <option value="" disabled selected>Pilih Opsi</option>
                                <option value="opsi1">Opsi 1</option>
                                <option value="opsi2">Opsi 2</option>
                            </select>
                        </div>
                        
                        {{-- Input 4 --}}
                        <div class="w-2/3">
                            <input type="text" class="w-full px-4 py-2 border border-gray-400 rounded-md focus:outline-none" placeholder="Input Data 4">
                        </div>
                    </div>

                    {{-- Textarea (Baris Penuh dan Lebih Besar) --}}
                    <div class="mb-6">
                        <textarea rows="6" class="w-full px-4 py-2 border border-gray-400 rounded-md focus:outline-none resize-none" placeholder="Area Input Deskripsi / Catatan"></textarea>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex justify-between items-center">
                        {{-- Tombol Edit --}}
                        <button type="submit" class="px-6 py-2 bg-gray-200 border border-gray-400 text-gray-800 rounded-md font-medium hover:bg-gray-300 focus:outline-none">
                            Edit
                        </button>
                        
                        {{-- Tombol Kembali --}}
                        <a href="/Admin/dashboard" class="px-6 py-2 bg-gray-200 border border-gray-400 text-gray-800 rounded-md font-medium hover:bg-gray-300 focus:outline-none">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>

</body>
</html>