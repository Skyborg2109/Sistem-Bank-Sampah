@extends('layouts.admin_simple')

@section('title', 'Input Data Sampah')

@section('content')
<h1 class="page-title">Input Data Sampah</h1>

<div style="max-width: 600px;">
    <form action="/Admin/data-sampah/store" method="POST">
        @csrf
        
        <div class="form-group">
            <label class="form-label">Jenis Sampah</label>
            <input type="text" name="jenis_sampah" class="form-input" value="{{ old('jenis_sampah') }}" required>
            @error('jenis_sampah')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Berat (Kg)</label>
            <input type="number" step="0.01" name="berat" class="form-input" value="{{ old('berat') }}" required>
            @error('berat')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-input" value="{{ old('tanggal', date('Y-m-d')) }}" required>
            @error('tanggal')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Kategori</label>
            <div style="display: flex; gap: 15px; margin-top: 8px;">
                <label style="display: flex; align-items: center; gap: 5px;">
                    <input type="checkbox" name="kategori[]" value="organik">
                    <span>Organik</span>
                </label>
                <label style="display: flex; align-items: center; gap: 5px;">
                    <input type="checkbox" name="kategori[]" value="anorganik">
                    <span>Anorganik</span>
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-textarea">{{ old('keterangan') }}</textarea>
        </div>

        <div style="display: flex; gap: 10px; margin-top: 30px;">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/Admin/data-sampah" class="btn">Kembali</a>
        </div>
    </form>
</div>

@endsection
