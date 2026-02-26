@extends('layouts.admin')

@section('title', 'Log Aktivitas')

@section('content')
<div class="animate-slide-in">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Log Aktivitas</h1>
            <p class="text-gray-600">Riwayat aktivitas akun Anda</p>
        </div>
        <a href="/admin/settings#security" class="text-indigo-600 hover:text-indigo-800 font-medium">
            &larr; Kembali ke Pengaturan
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-gray-50 text-gray-900 uppercase font-semibold text-xs">
                    <tr>
                        <th class="px-6 py-4">Aktivitas</th>
                        <th class="px-6 py-4">Deskripsi</th>
                        <th class="px-6 py-4">IP Address</th>
                        <th class="px-6 py-4">User Agent</th>
                        <th class="px-6 py-4">Waktu</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($logs as $log)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ ucfirst($log->action) }}
                        </td>
                        <td class="px-6 py-4">{{ $log->description }}</td>
                        <td class="px-6 py-4 font-mono text-xs">{{ $log->ip_address }}</td>
                        <td class="px-6 py-4 text-xs truncate max-w-xs" title="{{ $log->user_agent }}">
                            {{ $log->user_agent }}
                        </td>
                        <td class="px-6 py-4 text-gray-500 whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($log->created_at)->diffForHumans() }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p>Belum ada aktivitas tercatat.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
