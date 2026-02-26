<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function prosesLogin(Request $request)
    {
        // Validasi input
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role'     => 'required'
        ], [
            'username.required' => 'Username wajib diisi!',
            'password.required' => 'Password wajib diisi!',
            'role.required'     => 'Silahkan pilih peran login!'
        ]);

        // Ambil user berdasarkan username + role
        $user = DB::table('data_user_tabel')
                ->where('username', $request->username)
                ->where('role', $request->role)
                ->first();

        if (!$user) {
            return back()->with('error', 'Akun tidak ditemukan atau peran salah!')->withInput();
        }

        // Cek password
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password yang Anda masukkan salah!')->withInput();
        }

        // Simpan session
        session([
            'login'     => true,
            'nama_user' => $user->nama_user,
            'username'  => $user->username,
            'role'      => $user->role
        ]);

        // Redirect sesuai role
        switch ($user->role) {
            case 'admin':
                return redirect('/Admin/dashboard');
        
            case 'petugas':
                return redirect('/petugas');
        
            case 'Warga':
                return redirect('/Warga');
        }
        

        return back()->with('error', 'Role tidak dikenali!');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/')->with('success', 'Anda berhasil logout.');
    }
}