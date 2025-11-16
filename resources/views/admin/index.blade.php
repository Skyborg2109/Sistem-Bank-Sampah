<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Sampah</title>
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

        {{-- Sidebar (Menu Samping) --}}
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
            <a href="/Admin/summary" class="p-2 hover:bg-gray-200 rounded">
                {{-- Placeholder untuk Ikon Pengguna --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0z" />
                </svg>
            </a>
        </div>

        {{-- Konten Utama --}}
        <div class="main-content flex-1 p-6 transition-all duration-300">
            
            {{-- Header/Navbar Atas --}}
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

            {{-- Judul Halaman --}}
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">Kelola Data Sampah</h1>

            {{-- Area Pencarian dan Tombol Tambah --}}
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-4">
                {{-- Input Pencarian --}}
                <div class="relative flex-grow mb-4 md:mb-0 md:mr-4 max-w-lg">
                    <input type="text" placeholder="Temukan Data Sampah" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                
                {{-- Tombol Tambah Sampah (Menggunakan Form Sesuai Permintaan) --}}
                <form action="/Admin/kelolaDataSampah" method="POST">
                    @csrf
                    <button type="submit" class="inline-flex items-center px-3 py-1 bg-white border border-gray-300 text-sm font-medium rounded shadow-sm hover:bg-gray-50 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 mr-1">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah Sampah
                    </button>
                </form>
            </div>

            {{-- Tabel Data --}}
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-16">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">text</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">text</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">text</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">text</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-28">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @for ($i = 1; $i <= 5; $i++)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 w-16">{{ $i }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="h-8 w-full border border-gray-300 rounded-md"></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="h-8 w-full border border-gray-300 rounded-md"></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="h-8 w-full border border-gray-300 rounded-md"></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="h-8 w-full border border-gray-300 rounded-md"></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium w-28">
                                    {{-- Tombol Edit (Menggunakan a href Sesuai Permintaan) --}}
                                    <a href="/Admin/kelolaDataSampah" class="text-blue-600 hover:text-blue-900 inline-block p-1 border border-gray-300 rounded-full mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487z" />
                                        </svg>
                                    </a>
                                    
                                    {{-- Tombol Hapus --}}
                                    <form action="#" method="POST" class="inline-block">
                                       @csrf 
                                        {{-- @method('DELETE') --}}
                                        <button type="submit" class="text-red-600 hover:text-red-900 p-1 border border-gray-300 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m-1.252-.522L5.626 4.3c-.328-.327-.47-.723-.47-1.15V2.25c0-.414.336-.75.75-.75h14.5c.414 0 .75.336.75.75V3.15c0 .427-.142.823-.47 1.15l-1.928 1.928m-4.788 0z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>
</html>