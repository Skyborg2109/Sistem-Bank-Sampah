<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('data_user_tabel')->insert([
            [
                'nama_user'  => 'Admin',
                'username'   => 'admin',
                'email'      => 'admin@gmail.com',
                'password'   => Hash::make('admin123'),
                'role'       => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_user'  => 'Petugas',
                'username'   => 'petugas',
                'email'      => 'petugas@gmail.com',
                'password'   => Hash::make('petugas123'),
                'role'       => 'petugas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_user'  => 'Warga',
                'username'   => 'warga',
                'email'      => 'warga@gmail.com',
                'password'   => Hash::make('warga123'),
                'role'       => 'warga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        DB::table('data_user')
            ->whereIn('username', ['admin', 'petugas', 'warga'])
            ->delete();
    }
};
