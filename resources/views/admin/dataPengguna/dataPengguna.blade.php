@extends('layouts.admin')

@section('title', 'Data Pengguna')

@section('topbar-left')
    {{-- Search Bar --}}
    <div class="relative flex-1 max-w-md">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <input 
            type="text" 
            id="searchInput"
            class="search-input block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
            placeholder="Cari pengguna...">
    </div>
@endsection

@section('content')
<div class="animate-slide-in">
    {{-- Page Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Data Pengguna</h1>
        <p class="text-gray-600">Kelola semua pengguna yang terdaftar dalam sistem</p>
    </div>

    {{-- Action Bar --}}
    <div class="mb-6 flex items-center justify-between">
        <div class="flex items-center space-x-3">
            {{-- Filter by Role --}}
            <select id="roleFilter" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition focus:outline-none focus:ring-2 focus:ring-purple-500">
                <option value="">Semua Role</option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
                <option value="warga">Warga</option>
            </select>
            <span id="filterInfo" class="text-xs text-gray-500 hidden">
                <span id="filterCount">0</span> pengguna ditampilkan
            </span>
        </div>

        {{-- Add Button --}}
        <a href="/Admin/dataPengguna/create" class="btn-primary inline-flex items-center px-5 py-2.5 text-white text-sm font-semibold rounded-lg shadow-lg hover:shadow-xl transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah Pengguna
        </a>
    </div>

    {{-- Data Table --}}
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            No
                        </th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            Nama Lengkap
                        </th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            Username
                        </th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="tableBody">
                    @forelse($users as $index => $user)
                        <tr class="table-row">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                                        {{ strtoupper(substr($user->nama_user, 0, 2)) }}
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-semibold text-gray-900">{{ $user->nama_user }}</div>
                                        <div class="text-xs text-gray-500">ID: #{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 mr-2 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-sm text-gray-900">{{ $user->username }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $roleColors = [
                                        'admin' => 'bg-purple-100 text-purple-800',
                                        'petugas' => 'bg-blue-100 text-blue-800',
                                        'warga' => 'bg-green-100 text-green-800',
                                    ];
                                    $roleIcons = [
                                        'admin' => 'M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z',
                                        'petugas' => 'M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z',
                                        'warga' => 'M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z',
                                    ];
                                    $roleClass = $roleColors[strtolower($user->role)] ?? 'bg-gray-100 text-gray-800';
                                    $roleIcon = $roleIcons[strtolower($user->role)] ?? '';
                                @endphp
                                <span class="px-3 py-1 inline-flex items-center text-xs leading-5 font-semibold rounded-full {{ $roleClass }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $roleIcon }}" />
                                    </svg>
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <div class="flex items-center justify-center space-x-2">
                                    {{-- Edit Button --}}
                                    <a href="/Admin/dataPengguna/edit/{{ $user->id }}" 
                                       class="action-btn p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition"
                                       title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>

                                    {{-- Delete Button --}}
                                    <form action="/Admin/dataPengguna/delete/{{ $user->id }}" 
                                          method="POST" 
                                          class="inline-block"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna {{ $user->nama_user }}?')">
                                        @csrf
                                        <button type="submit" 
                                                class="action-btn p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition"
                                                title="Hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-gray-300 mb-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                    </svg>
                                    <p class="text-gray-500 text-lg font-medium mb-1">Belum ada pengguna</p>
                                    <p class="text-gray-400 text-sm mb-4">Mulai tambahkan pengguna untuk mengelola sistem</p>
                                    <a href="/Admin/dataPengguna/create" class="btn-primary inline-flex items-center px-4 py-2 text-white text-sm font-semibold rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                        Tambah Pengguna Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Table Footer with Stats --}}
        @if($users->count() > 0)
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-6">
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                        <span class="text-sm text-gray-600">Total Pengguna: <span class="font-semibold text-gray-900">{{ $users->count() }}</span></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                        <span class="text-sm text-gray-600">Admin: <span class="font-semibold text-gray-900">{{ $users->where('role', 'admin')->count() }}</span></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                        <span class="text-sm text-gray-600">Petugas: <span class="font-semibold text-gray-900">{{ $users->where('role', 'petugas')->count() }}</span></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                        <span class="text-sm text-gray-600">Warga: <span class="font-semibold text-gray-900">{{ $users->where('role', 'warga')->count() }}</span></span>
                    </div>
                </div>
                <div class="text-sm text-gray-500">
                    Menampilkan {{ $users->count() }} pengguna
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Combined search and filter functionality
    const searchInput = document.getElementById('searchInput');
    const roleFilter = document.getElementById('roleFilter');
    const tableBody = document.getElementById('tableBody');
    const filterInfo = document.getElementById('filterInfo');
    const filterCount = document.getElementById('filterCount');

    function filterTable() {
        const searchValue = searchInput.value.toLowerCase();
        const roleValue = roleFilter.value.toLowerCase();
        const tableRows = tableBody.querySelectorAll('tr');
        
        let visibleCount = 0;
        
        tableRows.forEach(row => {
            // Skip empty state row
            if (row.querySelector('td[colspan]')) {
                return;
            }

            const text = row.textContent.toLowerCase();
            const roleCell = row.querySelector('td:nth-child(4)'); // Role column
            const rowRole = roleCell ? roleCell.textContent.toLowerCase().trim() : '';
            
            // Check search match
            const matchesSearch = text.includes(searchValue);
            
            // Check role match
            const matchesRole = roleValue === '' || rowRole.includes(roleValue);
            
            // Show row if both conditions match
            if (matchesSearch && matchesRole) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        // Update filter info
        if (searchValue !== '' || roleValue !== '') {
            filterInfo.classList.remove('hidden');
            filterCount.textContent = visibleCount;
        } else {
            filterInfo.classList.add('hidden');
        }

        // Show/hide empty state
        updateEmptyState(visibleCount);
    }

    function updateEmptyState(visibleCount) {
        const emptyRow = tableBody.querySelector('tr td[colspan]');
        const hasData = {{ $users->count() > 0 ? 'true' : 'false' }};
        
        if (hasData && visibleCount === 0) {
            // Show "no results" message
            if (!document.getElementById('noResultsRow')) {
                const noResultsRow = document.createElement('tr');
                noResultsRow.id = 'noResultsRow';
                noResultsRow.innerHTML = `
                    <td colspan="5" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-gray-300 mb-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                            <p class="text-gray-500 text-lg font-medium mb-1">Tidak ada hasil</p>
                            <p class="text-gray-400 text-sm">Coba ubah filter atau kata kunci pencarian</p>
                        </div>
                    </td>
                `;
                tableBody.appendChild(noResultsRow);
            }
            document.getElementById('noResultsRow').style.display = '';
        } else {
            const noResultsRow = document.getElementById('noResultsRow');
            if (noResultsRow) {
                noResultsRow.style.display = 'none';
            }
        }
    }

    // Event listeners
    searchInput.addEventListener('keyup', filterTable);
    roleFilter.addEventListener('change', filterTable);

    // Add visual feedback for active filters
    roleFilter.addEventListener('change', function() {
        if (this.value !== '') {
            this.classList.add('ring-2', 'ring-purple-500', 'border-purple-500');
        } else {
            this.classList.remove('ring-2', 'ring-purple-500', 'border-purple-500');
        }
    });
</script>
@endpush
