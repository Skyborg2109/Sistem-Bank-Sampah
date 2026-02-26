@extends('layouts.admin')

@section('title', 'Tambah Data Sampah')

@section('topbar-left')
    <div class="flex items-center space-x-3">
        <a href="/Admin/data-sampah" class="text-gray-600 hover:text-gray-900 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
        </a>
        <h2 class="text-xl font-semibold text-gray-800">Tambah Data Sampah Baru</h2>
    </div>
@endsection

@section('content')
<div class="animate-slide-in max-w-2xl mx-auto">
    {{-- Form Card --}}
    <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-200">
        {{-- Header --}}
        <div class="mb-6 pb-6 border-b border-gray-200">
            <div class="flex items-center space-x-3">
                <div class="p-3 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Tambah Data Sampah</h2>
                    <p class="text-sm text-gray-600">Isi form di bawah untuk menambahkan data sampah baru</p>
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
        <form action="/Admin/data-sampah/store" method="POST" class="space-y-6">
            @csrf

            {{-- Jenis Sampah --}}
            <div>
                <label for="jenis_sampah" class="block text-sm font-semibold text-gray-700 mb-2">
                    Jenis Sampah <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                    </div>
                    <select 
                        id="jenis_sampah"
                        name="jenis_sampah" 
                        required
                        class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg leading-5 bg-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition appearance-none">
                        <option value="">-- Pilih Jenis Sampah --</option>
                        <option value="Plastik" {{ old('jenis_sampah') == 'Plastik' ? 'selected' : '' }}>Plastik</option>
                        <option value="Kertas" {{ old('jenis_sampah') == 'Kertas' ? 'selected' : '' }}>Kertas</option>
                        <option value="Logam" {{ old('jenis_sampah') == 'Logam' ? 'selected' : '' }}>Logam</option>
                        <option value="Kaca" {{ old('jenis_sampah') == 'Kaca' ? 'selected' : '' }}>Kaca</option>
                        <option value="Organik" {{ old('jenis_sampah') == 'Organik' ? 'selected' : '' }}>Organik</option>
                        <option value="Elektronik" {{ old('jenis_sampah') == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                        <option value="Lainnya" {{ old('jenis_sampah') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
                <p class="mt-1 text-xs text-gray-500">Pilih jenis sampah yang sesuai</p>
            </div>

            {{-- Berat --}}
            <div>
                <label for="berat" class="block text-sm font-semibold text-gray-700 mb-2">
                    Berat (Kg) <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0012 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 01-2.031.352 5.988 5.988 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 01-2.031.352 5.989 5.989 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971z" />
                        </svg>
                    </div>
                    <input 
                        type="number" 
                        id="berat"
                        name="berat" 
                        step="0.01"
                        min="0"
                        value="{{ old('berat') }}"
                        required
                        class="block w-full pl-10 pr-16 py-3 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                        placeholder="0.00">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 text-sm font-medium">Kg</span>
                    </div>
                </div>
                <p class="mt-1 text-xs text-gray-500">Masukkan berat dalam kilogram (contoh: 2.5)</p>
            </div>

            {{-- Tanggal --}}
            <div>
                <label for="tanggal" class="block text-sm font-semibold text-gray-700 mb-2">
                    Tanggal <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                        </svg>
                    </div>
                    <input 
                        type="date" 
                        id="tanggal"
                        name="tanggal" 
                        value="{{ old('tanggal', date('Y-m-d')) }}"
                        required
                        class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg leading-5 bg-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                </div>
                <p class="mt-1 text-xs text-gray-500">Tanggal pengumpulan sampah</p>
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                <a href="/Admin/data-sampah" 
                   class="inline-flex items-center px-5 py-2.5 bg-gray-100 text-gray-700 text-sm font-semibold rounded-lg hover:bg-gray-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Kembali
                </a>

                <button type="submit" 
                        class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-green-500 to-emerald-600 text-white text-sm font-semibold rounded-lg shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Simpan Data
                </button>
            </div>
        </form>
    </div>

    {{-- Info Card --}}
    <div class="mt-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-lg">
        <div class="flex items-start">
            <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
            </svg>
            <div>
                <p class="text-sm font-semibold text-green-800 mb-1">Informasi Jenis Sampah:</p>
                <ul class="text-xs text-green-700 space-y-1">
                    <li><strong>Plastik:</strong> Botol, kantong, kemasan plastik</li>
                    <li><strong>Kertas:</strong> Koran, kardus, kertas bekas</li>
                    <li><strong>Logam:</strong> Kaleng, besi, aluminium</li>
                    <li><strong>Kaca:</strong> Botol kaca, pecahan kaca</li>
                    <li><strong>Organik:</strong> Sisa makanan, daun, ranting</li>
                    <li><strong>Elektronik:</strong> Komponen elektronik bekas</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
