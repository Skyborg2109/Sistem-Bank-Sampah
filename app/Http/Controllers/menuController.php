<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class menuController extends Controller
{
    // login & regist
    public function index(){
        return view('login');
    }
    public function Daftar(){
        return view('daftar');
    }
    public function backLogin(){
        return view('/');
    }

    //admin
    public function adminDashboard(){
        return view('admin/index');
    }
    public function AdminkelolaDataSampah(){
        return view('admin/kelolaDataSampah');
    }
    public function AdmindataSampah(){
        return view('admin/dataSampah');
    }
    public function AdminkirimDataSampah(){
        return view('admin/kirimDataSampah');
    }
    public function dataPengguna(){
        return view('admin/dataPengguna');
    }
    public function adminSummary(){
        return view('admin/summary');
    }
    public function adminLaporan(){
        return view('admin/laporan');
    }

    //petugas
    public function petugasDashboard(){
        return view('petugas/index');
    }
    public function kelolaDataSampah(){
        return view('petugas/kelolaDataSampah');
    }
    public function dataSampah(){
        return view('petugas/dataSampah');
    }
    public function kirimDataSampah(){
        return view('petugas/kirimDataSampah');
    }
    public function summary(){
        return view('petugas/summary');
    }

    //warga
    public function wargaDashboard(){
        return view('warga/index');
    }
    public function laporan(){
        return view('warga/laporan');
    }
    public function list(){
        return view('warga/list');
    }
}
