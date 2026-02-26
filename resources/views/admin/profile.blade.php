@extends('layouts.admin')

@section('title', 'Profil Saya')

@section('content')
<div class="animate-slide-in">
    {{-- Page Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Profil Saya</h1>
        <p class="text-gray-600">Kelola informasi profil dan akun Anda</p>
    </div>



    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Profile Card --}}
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200">
                <div class="text-center">
                    {{-- Avatar --}}
                    <div class="w-32 h-32 mx-auto mb-4 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full flex items-center justify-center text-white text-4xl font-bold">
                        {{ strtoupper(substr($user->username ?? 'A', 0, 1)) }}
                    </div>
                    
                    <h2 class="text-xl font-bold text-gray-900 mb-1">{{ $user->nama_user ?? $user->username }}</h2>
                    
                    
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-purple-100 text-purple-800">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                        </svg>
                        {{ ucfirst($user->role ?? 'Admin') }}
                    </span>
                </div>
                
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <div class="space-y-3">
                        <div class="flex items-center text-sm">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-gray-600">{{ $user->email ?? 'Email belum diatur' }}</span>
                        </div>
                        @if(isset($user->telepon) && $user->telepon)
                        <div class="flex items-center text-sm">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span class="text-gray-600">{{ $user->telepon }}</span>
                        </div>
                        @endif
                        <div class="flex items-center text-sm">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-gray-600">Bergabung {{ isset($user->created_at) && $user->created_at ? \Carbon\Carbon::parse($user->created_at)->format('d M Y') : date('d M Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Profile Information --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-6">Informasi Profil</h3>
                
                <form action="/profile/update" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Nama Lengkap --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" name="nama_user" value="{{ old('nama_user', $user->nama_user ?? $user->username) }}" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('nama_user') border-red-500 @enderror">
                            @error('nama_user')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        {{-- Username --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                            <input type="text" value="{{ $user->username }}" disabled
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-500 cursor-not-allowed">
                            <p class="text-xs text-gray-500 mt-1">Username tidak dapat diubah</p>
                        </div>
                        
                        {{-- Email --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" placeholder="email@example.com"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('email') border-red-500 @enderror">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        {{-- No. Telepon --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">No. Telepon</label>
                            <input type="tel" name="telepon" value="{{ old('telepon', $user->telepon ?? '') }}" placeholder="08xxxxxxxxxx"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('telepon') border-red-500 @enderror">
                            @error('telepon')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        {{-- Alamat --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                            <textarea name="alamat" rows="3" placeholder="Masukkan alamat lengkap"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('alamat') border-red-500 @enderror">{{ old('alamat', $user->alamat ?? '') }}</textarea>
                            @error('alamat')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mt-6 flex justify-end">
                        <button type="submit" class="px-6 py-2.5 bg-gradient-to-br from-purple-500 to-indigo-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
            
            {{-- Change Password --}}
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 mt-6">
                <h3 class="text-lg font-bold text-gray-900 mb-6">Ubah Password</h3>
                
                <form action="/profile/change-password" method="POST">
                    @csrf
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Password Lama</label>
                            <input type="password" name="old_password" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('old_password') border-red-500 @enderror">
                            @error('old_password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
                            <input type="password" name="new_password" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('new_password') border-red-500 @enderror">
                            @error('new_password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password Baru</label>
                            <input type="password" name="new_password_confirmation" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        </div>
                    </div>
                    
                    <div class="mt-6 flex justify-end">
                        <button type="submit" class="px-6 py-2.5 bg-gradient-to-br from-purple-500 to-indigo-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition">
                            Ubah Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
