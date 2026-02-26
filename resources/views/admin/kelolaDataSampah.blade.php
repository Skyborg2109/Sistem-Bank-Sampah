<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Sampah</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .sidebar {
            width: 64px;
        }
        .main-content {
            margin-left: 64px;
        }
    </style>
</head>
<body class="bg-gray-100">

<div class="flex h-screen">

    <!-- SIDEBAR -->
    <div class="sidebar fixed h-full bg-white shadow-xl flex flex-col items-center py-4">
        <a href="/Admin/dashboard" class="p-2 mb-4 hover:bg-gray-200 rounded">
            home
        </a>

        <a href="/Admin/dataPengguna" class="p-2 mb-4 hover:bg-gray-200 rounded">
            data pengguna
        </a>

        <a href="/logout" class="p-2 hover:bg-gray-200 rounded text-red-600">
            logout
        </a>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content flex-1 p-6">

        <!-- HEADER -->
        <header class="flex justify-end items-center bg-white p-4 shadow-sm rounded mb-6">
            <div class="w-8 h-8 border rounded-full"></div>
        </header>

        <!-- CONTENT -->
        <div class="bg-white shadow-md rounded-lg p-8 max-w-2xl mx-auto">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
                Data Sampah
            </h1>

            <!-- INPUT HANYA TAMPILAN -->
            <div class="mb-4">
                <input type="text" class="w-full px-4 py-2 border rounded-md" placeholder="Input Data 1" disabled>
            </div>

            <div class="mb-4">
                <input type="text" class="w-full px-4 py-2 border rounded-md" placeholder="Input Data 2" disabled>
            </div>

            <div class="flex mb-4 space-x-4">
                <div class="w-1/3">
                    <select class="w-full px-4 py-2 border rounded-md" disabled>
                        <option>Pilih Opsi</option>
                    </select>
                </div>

                <div class="w-2/3">
                    <input type="text" class="w-full px-4 py-2 border rounded-md" placeholder="Input Data 4" disabled>
                </div>
            </div>

            <div class="mb-6">
                <textarea rows="4" class="w-full px-4 py-2 border rounded-md" disabled></textarea>
            </div>

            <!-- BUTTON NAVIGASI -->
            <div class="flex justify-between">
                <a href="/Admin/dashboard"
                   class="px-6 py-2 bg-gray-200 border rounded-md hover:bg-gray-300">
                    Kembali
                </a>

                <a href="/Admin/dataPengguna"
                   class="px-6 py-2 bg-gray-200 border rounded-md hover:bg-gray-300">
                    Lanjut
                </a>
            </div>

        </div>

    </div>
</div>

</body>
</html>
