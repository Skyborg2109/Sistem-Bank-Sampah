@extends('layouts.admin')

@section('title', 'Edit Pengguna')

@section('topbar-left')
    <div class="flex items-center space-x-3">
        <a href="/Admin/dataPengguna" class="text-gray-600 hover:text-gray-900 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
        </a>
        <h2 class="text-xl font-semibold text-gray-800">Edit Pengguna</h2>
    </div>
@endsection

@section('content')
<div class="animate-slide-in max-w-2xl mx-auto">
    {{-- Form Card --}}
    <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-200">
        {{-- Header --}}
        <div class="mb-6 pb-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="p-3 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Edit Pengguna</h2>
                        <p class="text-sm text-gray-600">Update informasi pengguna: <span class="font-semibold">{{ $user->nama_user }}</span></p>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-full flex items-center justify-center text-white font-bold text-xl">
                        {{ strtoupper(substr($user->nama_user, 0, 2)) }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-red-500 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <p class="font-semibold text-red-800 mb-1">Terdapat kesalahan:</p>
                        <ul class="list-disc list-inside text-sm text-red-700">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        {{-- Form --}}
        <form action="/Admin/dataPengguna/update/{{ $user->id }}" method="POST" class="space-y-6">
            @csrf

            {{-- User ID Info --}}
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase">User ID</p>
                        <p class="text-lg font-bold text-gray-900">#{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs font-semibold text-gray-500 uppercase">Status</p>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                            Aktif
                        </span>
                    </div>
                </div>
            </div>

            {{-- Nama Lengkap --}}
            <div>
                <label for="nama_user" class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        id="nama_user"
                        name="nama_user" 
                        value="{{ old('nama_user', $user->nama_user) }}"
                        required
                        class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        placeholder="Masukkan nama lengkap">
                </div>
            </div>

            {{-- Username --}}
            <div>
                <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">
                    Username <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        id="username"
                        name="username" 
                        value="{{ old('username', $user->username) }}"
                        required
                        class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        placeholder="Masukkan username">
                </div>
                <p class="mt-1 text-xs text-gray-500">Username harus unik dan tidak boleh sama dengan pengguna lain</p>
            </div>

            {{-- Password Info --}}
            <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 rounded-lg">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-yellow-500 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <p class="text-sm font-semibold text-yellow-800">Informasi Password</p>
                        <p class="text-xs text-yellow-700 mt-1">Password tidak dapat diubah melalui form ini. Untuk mengubah password, hubungi administrator sistem.</p>
                    </div>
                </div>
            </div>

            {{-- Role --}}
            <div>
                <label for="role" class="block text-sm font-semibold text-gray-700 mb-2">
                    Role <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                    </div>
                    <select 
                        id="role"
                        name="role" 
                        required
                        class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg leading-5 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition appearance-none">
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                        <option value="warga" {{ strtolower($user->role) == 'warga' ? 'selected' : '' }}>Warga</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
                <p class="mt-1 text-xs text-gray-500">Hati-hati saat mengubah role, ini akan mempengaruhi hak akses pengguna</p>
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                <a href="/Admin/dataPengguna" 
                   class="inline-flex items-center px-5 py-2.5 bg-gray-100 text-gray-700 text-sm font-semibold rounded-lg hover:bg-gray-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Kembali
                </a>

                <button type="submit" 
                        class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-blue-500 to-cyan-600 text-white text-sm font-semibold rounded-lg shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                    Update Pengguna
                </button>
            </div>
        </form>
    </div>

    {{-- Info Card --}}
    <div class="mt-6 bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg">
        <div class="flex items-start">
            <svg class="w-5 h-5 text-blue-500 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
            </svg>
            <div>
                <p class="text-sm font-semibold text-blue-800 mb-1">Informasi Role:</p>
                <ul class="text-xs text-blue-700 space-y-1">
                    <li><strong>Admin:</strong> Akses penuh ke semua fitur sistem</li>
                    <li><strong>Petugas:</strong> Dapat mengelola data sampah</li>
                    <li><strong>Warga:</strong> Dapat membuat laporan sampah</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
