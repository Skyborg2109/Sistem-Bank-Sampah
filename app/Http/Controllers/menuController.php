<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MenuController extends Controller
{
    /* ======================================================
    | AUThENTIKASI
    ====================================================== */
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        session([
            'login' => true,
            'username' => $request->username ?? null,
            'role' => strtolower($request->role)
        ]);

        return redirect('/' . session('role'));
    }

    public function logout()
    {
        session()->flush();
        return redirect('/')->with('success', 'Berhasil logout');
    }

    /* ======================================================
    | ADMIN - DASHBOARD
    ====================================================== */
    public function adminDashboard()
    {
        if ($x = $this->checkRole('admin')) return $x;
        return view('admin/index');
    }

    /* ======================================================
    | ADMIN - DATA SAMPAH (CRUD)
    ====================================================== */
    public function adminDataSampahIndex()
    {
        if ($x = $this->checkRole('admin')) return $x;

        $sampah = DB::table('data_sampah')->orderBy('tanggal', 'desc')->get();
        return view('admin/datasampah/dataSampah', compact('sampah'));
    }

    public function adminDataSampahCreate()
    {
        if ($x = $this->checkRole('admin')) return $x;
        $sampah = DB::table('data_sampah')->get();
        return view('admin/datasampah/dataSampahTambah',compact('sampah'));
    }

    public function adminDataSampahStore(Request $request)
    {
        if ($x = $this->checkRole('admin')) return $x;

        DB::table('data_sampah')->insert([
            'jenis_sampah' => $request->jenis_sampah,
            'berat' => $request->berat,
            'tanggal' => $request->tanggal,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/Admin/data-sampah')->with('success', 'Data sampah ditambahkan');
    }

    /* ===== FORM EDIT DATA SAMPAH ===== */
public function adminEditDataSampah($id)
{
    if ($x = $this->checkRole('admin')) return $x;

    $sampah = DB::table('data_sampah')->where('id', $id)->first();

    if (!$sampah) {
        return redirect('/Admin/dataSampah')->with('error', 'Data tidak ditemukan');
    }

    return view('admin/datasampah/dataSampahEdit', compact('sampah'));
}

/* ===== UPDATE DATA SAMPAH ===== */
public function adminUpdateDataSampah(Request $request, $id)
{
    if ($x = $this->checkRole('admin')) return $x;

    $request->validate([
        'jenis_sampah' => 'required',
        'berat' => 'required|numeric',
        'tanggal' => 'required'
    ]);

    DB::table('data_sampah')->where('id', $id)->update([
        'jenis_sampah' => $request->jenis_sampah,
        'berat' => $request->berat,
        'tanggal' => $request->tanggal,
        'updated_at' => now()
    ]);

    return redirect('/Admin/data-sampah')->with('success', 'Data sampah berhasil diupdate');
}


    public function adminDataSampahDelete($id)
    {
        if ($x = $this->checkRole('admin')) return $x;

        DB::table('data_sampah')->where('id', $id)->delete();
        return back()->with('success', 'Data sampah dihapus');
    }
// ------------------------------------------------------------------------------

    public function adminDataPengguna()
    {
        $users = DB::table('data_user_tabel')->get();
        return view('admin.dataPengguna.dataPengguna', compact('users'));
    }

    public function adminCreatePengguna()
    {
        return view('admin.dataPengguna.dataPenggunaTambah');
    }

    public function adminStorePengguna(Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'username'  => 'required|unique:data_user_tabel',
            'password'  => 'required',
            'role'      => 'required'
        ]);

        DB::table('data_user_tabel')->insert([
            'nama_user' => $request->nama_user,
            'username'  => $request->username,
            'password'  => Hash::make($request->password),
            'role'      => $request->role,
        ]);

        return redirect('/Admin/dataPengguna')
            ->with('success', 'Pengguna berhasil ditambahkan');
    }

    public function adminEditPengguna($id)
    {
        $user = DB::table('data_user_tabel')->where('id', $id)->first();
        return view('admin.dataPengguna.dataPenggunaEdit', compact('user'));
    }

    public function adminUpdatePengguna(Request $request, $id)
    {
        DB::table('data_user_tabel')
            ->where('id', $id)
            ->update([
                'nama_user' => $request->nama_user,
                'username'  => $request->username,
                'role'      => $request->role,
            ]);

        return redirect('/Admin/dataPengguna')
            ->with('success', 'Pengguna berhasil diupdate');
    }

    public function adminDeletePengguna($id)
    {
        DB::table('data_user_tabel')->where('id', $id)->delete();

        return redirect('/Admin/dataPengguna')
            ->with('success', 'Pengguna berhasil dihapus');
    }

// ------------------------------------------------------------------------------

    public function laporanIndex()
    {
        $laporan = DB::table('laporan')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('admin.laporan.index', compact('laporan'));
    }

    public function laporanCetak()
    {
        $laporan = DB::table('laporan')
            ->orderBy('tanggal', 'desc')
            ->get();
            
        return view('admin.laporan.cetak', compact('laporan'));
    }

    // DELETE
    public function laporanDelete($id)
    {
        DB::table('laporan')->where('id', $id)->delete();

        return back()->with('success', 'Laporan berhasil dihapus');
    }

    /* ======================================================
    | PETUGAS - DASHBOARD & DATA SAMPAH (READ ONLY)
    ====================================================== */
    public function petugasDashboard()
    {
        if ($x = $this->checkRole('petugas')) return $x;

        $sampah = DB::table('data_sampah')->orderBy('tanggal', 'desc')->get();

        $totalData  = DB::table('data_sampah')->count();
        $totalBerat = DB::table('data_sampah')->sum('berat');
        return view('petugas/index', compact('sampah','totalData','totalBerat'));
    }

    public function petugasDataSampahIndex()
    {
        if ($x = $this->checkRole('petugas')) return $x;

        $sampah = DB::table('data_sampah')->orderBy('tanggal', 'desc')->get();

        $totalData  = DB::table('data_sampah')->count();
        $totalBerat = DB::table('data_sampah')->sum('berat');

        return view('petugas/dataSampah', compact('sampah','totalData','totalBerat'));
    }


    public function petugasDataSampahCreate()
    {
        if ($x = $this->checkRole('petugas')) return $x;

        return view('petugas/kelolaDataSampah');
    }

    public function petugasDataSampahStore(Request $request)
    {
        if ($x = $this->checkRole('petugas')) return $x;

        $request->validate([
            'jenis_sampah' => 'required',
            'berat' => 'required|numeric',
            'tanggal' => 'required'
        ]);

        DB::table('data_sampah')->insert([
            'jenis_sampah' => $request->jenis_sampah,
            'berat' => $request->berat,
            'tanggal' => $request->tanggal,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/petugas/datasampah')
            ->with('success', 'Data sampah berhasil ditambahkan');
    }

    public function petugasDataSampahEdit($id)
    {
        if ($x = $this->checkRole('petugas')) return $x;
        $sampah = DB::table('data_sampah')->where('id', $id)->first();
        if (!$sampah) {
            return redirect('/petugas/datasampah')
                ->with('error', 'Data tidak ditemukan');
        }

        return view('petugas/dataSampahEdit', compact('sampah'));
    }

    public function petugasDataSampahUpdate(Request $request, $id)
    {
        if ($x = $this->checkRole('petugas')) return $x;

        $request->validate([
            'jenis_sampah' => 'required',
            'berat' => 'required|numeric',
            'tanggal' => 'required'
        ]);

        DB::table('data_sampah')->where('id', $id)->update([
            'jenis_sampah' => $request->jenis_sampah,
            'berat' => $request->berat,
            'tanggal' => $request->tanggal,
            'updated_at' => now()
        ]);

        return redirect('/petugas')
            ->with('success', 'Data sampah berhasil diperbarui');
    }

    public function petugasDataSampahDelete($id)
    {
        if ($x = $this->checkRole('petugas')) return $x;

        DB::table('data_sampah')->where('id', $id)->delete();

        return back()->with('success', 'Data sampah berhasil dihapus');
    }

    // public function logout(Request $request)
    // {
    //     $request->session()->flush();
    //     return redirect('/')->with('success', 'Berhasil logout');
    // }

    /* ======================================================
    | WARGA - DASHBOARD & LAPORAN
    ====================================================== */
    public function wargaDashboard()
    {
        if ($x = $this->checkRole('warga')) return $x;
        
        // Ambil laporan sampah milik warga yang login
        $laporan = DB::table('laporan')
            ->where('nama_warga', session('username'))
            ->orderBy('tanggal', 'desc')
            ->get();
        
        // Hitung total berat sampah
        $totalBerat = $laporan->sum('berat');
        
        return view('warga/index', compact('laporan', 'totalBerat'));
    }

    public function wargaLaporan()
    {
        if ($x = $this->checkRole('Warga')) return $x;

        $jenisSampah = DB::table('data_sampah')
            ->select('jenis_sampah')
            ->distinct()
            ->get();

        return view('Warga.laporan', compact('jenisSampah'));
    }

    public function wargaLaporanCreate()
    {
        if ($x = $this->checkRole('warga')) return $x;

        $jenisSampah = DB::table('data_sampah')
            ->select('jenis_sampah')
            ->distinct()
            ->get();

        return view('warga/laporan/create', compact('jenisSampah'));
    }

    public function wargaLaporanStore(Request $request)
    {
        if ($x = $this->checkRole('warga')) return $x;

        // Validasi input
        $request->validate([
            'jenis_sampah' => 'required',
            'berat' => 'required|numeric|min:0.01',
            'keterangan' => 'nullable|string|max:500'
        ], [
            'jenis_sampah.required' => 'Jenis sampah wajib dipilih!',
            'berat.required' => 'Berat sampah wajib diisi!',
            'berat.numeric' => 'Berat harus berupa angka!',
            'berat.min' => 'Berat minimal 0.01 Kg!',
        ]);

        try {
            DB::table('laporan')->insert([
                'nama_warga' => session('username'),
                'jenis_sampah' => $request->jenis_sampah,
                'berat' => floatval($request->berat), // Konversi ke float untuk memastikan desimal tersimpan
                'keterangan' => $request->keterangan,
                'tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Create notification for admin
            \App\Http\Controllers\NotificationController::create(
                'laporan',
                'Laporan Baru Masuk',
                session('username') . ' melaporkan ' . $request->berat . ' Kg sampah ' . $request->jenis_sampah,
                'admin',
                '/Admin/laporan',
                'laporan'
            );

            return redirect('/Warga')->with('success', 'Laporan berhasil dikirim! Berat: ' . $request->berat . ' Kg');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function wargaLaporanIndex()
    {
        if ($x = $this->checkRole('warga')) return $x;

        $laporan = DB::table('laporan')
            ->where('nama_warga', session('username'))
            ->orderBy('tanggal', 'desc')
            ->get();
        
        $jenisSampah = DB::table('data_sampah')
            ->select('jenis_sampah')
            ->distinct()
            ->get();

        return view('warga.laporan', compact('laporan', 'jenisSampah'));
    }

    /* ======================================================
    | CEK ROLE
    ====================================================== */
    private function checkRole($requiredRole)
    {
        if (strtolower(session('role')) !== strtolower($requiredRole)) {
            return redirect('/')->with('error', 'Akses ditolak');
        }
        return null;
    }
}
