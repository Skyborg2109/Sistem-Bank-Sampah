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
