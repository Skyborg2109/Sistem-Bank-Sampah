@extends('layouts.petugas')

@section('title', 'Edit Data Sampah')
@section('header', 'Edit Data Sampah')

@section('content')
<div class="animate-slide-in max-w-2xl mx-auto">
    <div class="mb-6">
        <a href="/petugas/datasampah" class="text-indigo-600 hover:text-indigo-800 flex items-center transition">
            <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Daftar
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="border-b border-gray-100 px-6 py-4 bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">Edit Data</h2>
            <p class="text-sm text-gray-500 mt-1">Perbarui informasi data sampah.</p>
        </div>
        
        <form action="/petugas/datasampah/update/{{ $sampah->id }}" method="POST" class="p-6 space-y-6">
            @csrf
            
            <!-- Jenis Sampah -->
            <div>
                <label for="jenis_sampah" class="block text-sm font-medium text-gray-700 mb-2">Jenis Sampah <span class="text-red-500">*</span></label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </span>
                    <select name="jenis_sampah" id="jenis_sampah" required class="pl-10 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-11 border px-3">
                        <option value="" disabled>-- Pilih Jenis --</option>
                        <option value="Organik" {{ $sampah->jenis_sampah == 'Organik' ? 'selected' : '' }}>Organik</option>
                        <option value="Anorganik" {{ $sampah->jenis_sampah == 'Anorganik' ? 'selected' : '' }}>Anorganik</option>
                        <option value="B3" {{ $sampah->jenis_sampah == 'B3' ? 'selected' : '' }}>B3</option>
                        <option value="Kertas" {{ $sampah->jenis_sampah == 'Kertas' ? 'selected' : '' }}>Kertas</option>
                        <option value="Plastik" {{ $sampah->jenis_sampah == 'Plastik' ? 'selected' : '' }}>Plastik</option>
                        <option value="Logam" {{ $sampah->jenis_sampah == 'Logam' ? 'selected' : '' }}>Logam</option>
                        <option value="Residu" {{ $sampah->jenis_sampah == 'Residu' ? 'selected' : '' }}>Residu</option>
                    </select>
                </div>
            </div>

            <!-- Berat -->
            <div>
                <label for="berat" class="block text-sm font-medium text-gray-700 mb-2">Berat Sampah (Kg) <span class="text-red-500">*</span></label>
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                        </svg>
                    </div>
                    <input type="number" name="berat" id="berat" required step="0.01" min="0.01" value="{{ $sampah->berat }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 pr-12 sm:text-sm border-gray-300 rounded-lg h-11 border px-3" placeholder="0.00">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm">Kg</span>
                    </div>
                </div>
            </div>

            <!-- Tanggal -->
            <div>
                <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Setor <span class="text-red-500">*</span></label>
                <div class="relative">
                     <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </span>
                    <input type="date" name="tanggal" id="tanggal" required value="{{ \Carbon\Carbon::parse($sampah->tanggal)->format('Y-m-d') }}" class="pl-10 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-11 border px-3">
                </div>
            </div>

            <div class="pt-4 flex justify-end space-x-3">
                <a href="/petugas/datasampah" class="px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-center">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
