@extends('layouts.admin_simple')

@section('title', 'Kelola Data Sampah')

@section('content')
<h1 class="page-title">Kelola Data Sampah</h1>

<!-- Search and Add Button -->
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <div class="search-container" style="flex: 1; max-width: 500px;">
        <input type="text" id="searchInput" class="search-input" placeholder="🔍 Temukan Data Sampah">
    </div>
    
    <a href="/Admin/data-sampah/create" class="btn btn-primary">+ Tambah Sampah</a>
</div>

<!-- Data Table -->
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th style="width: 60px;">No</th>
                <th>Jenis Sampah</th>
                <th>Berat (Kg)</th>
                <th>Tanggal</th>
                <th style="width: 120px; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            @forelse($sampah as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->jenis_sampah }}</td>
                    <td>{{ number_format($item->berat, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                    <td>
                        <div class="action-buttons" style="justify-content: center;">
                            <!-- Edit Button -->
                            <a href="/Admin/data-sampah/edit/{{ $item->id }}" class="action-btn" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>

                            <!-- Delete Button -->
                            <form action="/Admin/data-sampah/delete/{{ $item->id }}" 
                                  method="POST" 
                                  style="display: inline;"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf
                                <button type="submit" class="action-btn" title="Hapus">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 40px; color: #999;">
                        Belum ada data sampah
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($sampah->count() > 0)
<div style="margin-top: 15px; color: #666; font-size: 14px;">
    Total Data: <strong>{{ $sampah->count() }}</strong> | 
    Total Berat: <strong>{{ number_format($sampah->sum('berat'), 2) }} Kg</strong>
</div>
@endif

@endsection

@push('scripts')
<script>
    // Search functionality
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('#tableBody tr');
        
        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            if (text.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endpush
