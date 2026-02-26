@extends('layouts.admin')

@section('title', 'Sesi Aktif')

@section('content')
<div class="animate-slide-in">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Sesi Aktif</h1>
            <p class="text-gray-600">Perangkat yang sedang login ke akun Anda</p>
        </div>
        <a href="/admin/settings#security" class="text-indigo-600 hover:text-indigo-800 font-medium">
            &larr; Kembali ke Pengaturan
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
        <ul class="divide-y divide-gray-200">
            @foreach($sessions as $session)
            <li class="p-6 flex items-center justify-between hover:bg-gray-50 transition">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <div class="flex items-center">
                            <h4 class="text-sm font-medium text-gray-900 mr-2">
                                {{ $session->user_agent }}
                            </h4>
                            @if($session->is_current)
                            <span class="px-2 py-0.5 rounded text-xs font-semibold bg-green-100 text-green-800">
                                Perangkat Ini
                            </span>
                            @endif
                        </div>
                        <p class="text-xs text-gray-500 mt-1">
                            IP: {{ $session->ip_address }} &bull; Aktif {{ $session->last_activity }}
                        </p>
                    </div>
                </div>
                
                @if(!$session->is_current)
                <button class="text-sm text-red-600 hover:text-red-800 font-medium">
                    Logout
                </button>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
