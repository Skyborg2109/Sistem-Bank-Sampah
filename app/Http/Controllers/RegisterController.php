<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Menampilkan form registrasi
     */
    public function daftar()
    {
        return view('daftar');
    }

    /**
     * Memproses registrasi user baru
     */
    public function prosesDaftar(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required|unique:data_user_tabel',
            'email' => 'required|email|unique:data_user_tabel',
            'password' => 'required',
            'role' => 'required|in:Warga,petugas',
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi!',
            'username.required' => 'Username wajib diisi!',
            'username.unique' => 'Username sudah terdaftar!',
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email tidak valid!',
            'email.unique' => 'Email sudah terdaftar!',
            'password.required' => 'Password wajib diisi!',
            'role.required' => 'Role wajib dipilih!',
            'role.in' => 'Pilihan role tidak valid!',
        ]);

        try {
            DB::table('data_user_tabel')->insert([
                'nama_user' => $request->nama_lengkap, // Mapped to correct column name
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            return redirect('/')->with('success', 'Pendaftaran berhasil, Silahkan Login');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }
}
