@extends('layouts.warga')

@section('title', 'Laporan Sampah')

@section('content')
<h1 class="page-title">Laporan Bank Sampah</h1>

<div style="max-width: 600px; margin: 0 auto;">
    <div style="background: white; padding: 30px; border-radius: 4px; border: 1px solid #e0e0e0;">
        
        <form action="/warga/laporan" method="POST">
            @csrf
            
            <div class="form-group">
                <label class="form-label">Nama Warga</label>
                <input type="text" class="form-input" value="{{ session('username') }}" readonly style="background: #f5f5f5;">
            </div>

            <div class="form-group">
                <label class="form-label">Jenis Sampah</label>
                <select name="jenis_sampah" class="form-select" required>
                    <option value="">Pilih Jenis Sampah</option>
                    @if(isset($jenisSampah))
                        @foreach($jenisSampah as $js)
                            <option value="{{ $js->jenis_sampah }}" {{ old('jenis_sampah') == $js->jenis_sampah ? 'selected' : '' }}>
                                {{ $js->jenis_sampah }}
                            </option>
                        @endforeach
                    @else
                        <option value="Plastik">Plastik</option>
                        <option value="Kertas">Kertas</option>
                        <option value="Logam">Logam</option>
                        <option value="Kaca">Kaca</option>
                        <option value="Organik">Organik</option>
                    @endif
                </select>
                @error('jenis_sampah')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Berat Sampah (Kg)</label>
                <input type="number" step="0.01" name="berat" class="form-input" placeholder="Contoh: 2.5" value="{{ old('berat') }}" required>
                @error('berat')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Keterangan (Opsional)</label>
                <textarea name="keterangan" class="form-textarea" placeholder="Tambahkan keterangan jika diperlukan">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div style="display: flex; gap: 10px; justify-content: flex-end; margin-top: 30px;">
                <a href="/Warga" class="btn">Kembali</a>
                <button type="submit" class="btn btn-primary">Kirim Laporan</button>
            </div>
        </form>

    </div>

    <!-- Riwayat Laporan -->
    @if(isset($laporan) && $laporan->count() > 0)
    <div style="margin-top: 30px;">
        <h3 style="margin-bottom: 15px; color: #333;">Riwayat Laporan Anda</h3>
        <div class="item-list">
            @foreach($laporan->take(5) as $index => $item)
                <div class="list-item">
                    <span class="item-number">{{ $index + 1 }}</span>
                    <div class="item-data">
                        <div class="item-detail">
                            <div>
                                <span class="item-label">Jenis:</span>
                                <span class="item-value">{{ $item->jenis_sampah }}</span>
                            </div>
                            <div>
                                <span class="item-label">Berat:</span>
                                <span class="item-value">{{ number_format($item->berat, 2) }} Kg</span>
                            </div>
                            <div>
                                <span class="item-label">Tanggal:</span>
                                <span class="item-value">{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y H:i') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if($laporan->count() > 5)
        <div style="text-align: center; margin-top: 15px;">
            <a href="/Warga" class="btn">Lihat Semua Laporan</a>
        </div>
        @endif
    </div>
    @endif
</div>

@endsection

@push('styles')
<style>
    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        font-weight: 500;
        color: #333;
    }

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }

    .form-textarea {
        resize: vertical;
        min-height: 100px;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: none;
        border-color: #4CAF50;
    }

    .error-message {
        color: #dc3545;
        font-size: 12px;
        margin-top: 5px;
    }
</style>
@endpush
