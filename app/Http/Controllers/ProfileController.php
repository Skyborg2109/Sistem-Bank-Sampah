<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class ProfileController extends Controller
{
    // Show profile page
    public function show()
    {
        $username = session('username');
        
        // Get user data from database
        $user = DB::table('data_user_tabel')
            ->where('username', $username)
            ->first();
        
        if (!$user) {
            return redirect('/login')->with('error', 'User tidak ditemukan');
        }
        
        return view('admin.profile', compact('user'));
    }
    
    // Update profile
    public function update(Request $request)
    {
        $username = session('username');
        
        $request->validate([
            'nama_user' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:500'
        ], [
            'nama_user.required' => 'Nama lengkap wajib diisi!',
            'email.email' => 'Format email tidak valid!',
        ]);
        
        try {
            $updateData = [
                'nama_user' => $request->nama_user,
                'updated_at' => now()
            ];
            
            // Only update if columns exist
            if (Schema::hasColumn('data_user_tabel', 'email')) {
                $updateData['email'] = $request->email;
            }
            if (Schema::hasColumn('data_user_tabel', 'telepon')) {
                $updateData['telepon'] = $request->telepon;
            }
            if (Schema::hasColumn('data_user_tabel', 'alamat')) {
                $updateData['alamat'] = $request->alamat;
            }
            
            DB::table('data_user_tabel')
                ->where('username', $username)
                ->update($updateData);
            
            // Update session
            session(['nama_user' => $request->nama_user]);
            
            return back()->with('success', 'Profil berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    
    // Change password
    public function changePassword(Request $request)
    {
        $username = session('username');
        
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ], [
            'old_password.required' => 'Password lama wajib diisi!',
            'new_password.required' => 'Password baru wajib diisi!',
            'new_password.min' => 'Password baru minimal 6 karakter!',
            'new_password.confirmed' => 'Konfirmasi password tidak cocok!',
        ]);
        
        try {
            // Get current user
            $user = DB::table('data_user_tabel')
                ->where('username', $username)
                ->first();
            
            if (!$user) {
                return back()->with('error', 'User tidak ditemukan!');
            }
            
            // Check old password
            if (!Hash::check($request->old_password, $user->password)) {
                return back()->with('error', 'Password lama tidak sesuai!');
            }
            
            // Update password
            DB::table('data_user_tabel')
                ->where('username', $username)
                ->update([
                    'password' => Hash::make($request->new_password),
                    'updated_at' => now()
                ]);
            
            return back()->with('success', 'Password berhasil diubah!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
