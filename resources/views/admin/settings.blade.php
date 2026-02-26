@extends('layouts.admin')

@section('title', 'Pengaturan')

@section('content')
<div class="animate-slide-in">
    {{-- Page Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Pengaturan</h1>
        <p class="text-gray-600">Kelola preferensi dan konfigurasi sistem Anda</p>
    </div>



    <form action="/admin/settings/update" method="POST">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Settings Menu --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden sticky top-6">
                    <div class="p-4 bg-gradient-to-br from-purple-500 to-indigo-600">
                        <h3 class="text-lg font-bold text-white">Menu Pengaturan</h3>
                    </div>
                    <nav class="p-2">
                        <a href="#general" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition">
                            <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Umum
                        </a>
                        <a href="#notifications" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition">
                            <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            Notifikasi
                        </a>
                        <a href="#security" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition">
                            <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            Keamanan
                        </a>
                        <a href="#appearance" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition">
                            <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                            </svg>
                            Tampilan
                        </a>
                    </nav>
                </div>
            </div>

            {{-- Settings Content --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- General Settings --}}
                <div id="general" class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 scroll-mt-20">
                    <h3 class="text-lg font-bold text-gray-900 mb-6">Pengaturan Umum</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-medium text-gray-900">Bahasa</h4>
                                <p class="text-xs text-gray-500">Pilih bahasa tampilan sistem</p>
                            </div>
                            <select name="language" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                <option value="id" {{ $settings->language == 'id' ? 'selected' : '' }}>Bahasa Indonesia</option>
                                <option value="en" {{ $settings->language == 'en' ? 'selected' : '' }}>English</option>
                            </select>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-medium text-gray-900">Zona Waktu</h4>
                                <p class="text-xs text-gray-500">Atur zona waktu lokal Anda</p>
                            </div>
                            <select name="timezone" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                <option value="WIB" {{ $settings->timezone == 'WIB' ? 'selected' : '' }}>WIB (UTC+7)</option>
                                <option value="WITA" {{ $settings->timezone == 'WITA' ? 'selected' : '' }}>WITA (UTC+8)</option>
                                <option value="WIT" {{ $settings->timezone == 'WIT' ? 'selected' : '' }}>WIT (UTC+9)</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Notification Settings --}}
                <div id="notifications" class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 scroll-mt-20">
                    <h3 class="text-lg font-bold text-gray-900 mb-6">Pengaturan Notifikasi</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-medium text-gray-900">Notifikasi Email</h4>
                                <p class="text-xs text-gray-500">Terima notifikasi melalui email</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="email_notifications" class="sr-only peer" {{ $settings->email_notifications ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
                            </label>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-medium text-gray-900">Notifikasi Push</h4>
                                <p class="text-xs text-gray-500">Terima notifikasi push di browser</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="push_notifications" class="sr-only peer" {{ $settings->push_notifications ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
                            </label>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-medium text-gray-900">Suara Notifikasi</h4>
                                <p class="text-xs text-gray-500">Putar suara saat ada notifikasi baru</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="sound_notifications" class="sr-only peer" {{ $settings->sound_notifications ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Security Settings --}}
                <div id="security" class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 scroll-mt-20">
                    <h3 class="text-lg font-bold text-gray-900 mb-6">Keamanan</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-medium text-gray-900">Autentikasi Dua Faktor</h4>
                                <p class="text-xs text-gray-500">Tambahkan lapisan keamanan ekstra</p>
                            </div>
                            <!-- Fitur dummy untuk sementara -->
                            <button type="button" onclick="alert('Fitur Autentikasi Dua Faktor akan segera hadir!')" class="px-4 py-2 text-sm font-medium text-purple-600 hover:text-purple-700 border border-purple-600 rounded-lg hover:bg-purple-50 transition">
                                Aktifkan
                            </button>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-medium text-gray-900">Sesi Aktif</h4>
                                <p class="text-xs text-gray-500">Kelola perangkat yang terhubung</p>
                            </div>
                            <a href="/admin/sessions" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                                Lihat Sesi
                            </a>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-medium text-gray-900">Log Aktivitas</h4>
                                <p class="text-xs text-gray-500">Riwayat aktivitas akun Anda</p>
                            </div>
                            <a href="/admin/activity-logs" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                                Lihat Log
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Appearance Settings --}}
                <div id="appearance" class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 scroll-mt-20">
                    <h3 class="text-lg font-bold text-gray-900 mb-6">Tampilan</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-medium text-gray-900">Mode Gelap</h4>
                                <p class="text-xs text-gray-500">Gunakan tema gelap untuk tampilan</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="dark_mode" class="sr-only peer" {{ $settings->dark_mode ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
                            </label>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-medium text-gray-900">Sidebar Kompak</h4>
                                <p class="text-xs text-gray-500">Gunakan sidebar yang lebih kecil</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="compact_sidebar" class="sr-only peer" {{ $settings->compact_sidebar ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Save Button --}}
                <div class="flex justify-end sticky bottom-6 z-10">
                    <button type="submit" class="px-6 py-2.5 bg-gradient-to-br from-purple-500 to-indigo-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
                        Simpan Semua Pengaturan
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- Script untuk smooth scroll yang lebih baik jika diperlukan, 
     namun CSS scroll-behavior: smooth di html biasanya sudah cukup.
     Tambahan: Handle sticky menu active state --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Highlight active menu item based on scroll position
        const sections = document.querySelectorAll('[id]');
        const navLinks = document.querySelectorAll('nav a');
        
        // Add scroll-mt-20 class to sections for better offset
        
        // Simple active state toggling logic could go here if undesired default browser behavior
    });
</script>
@endsection
