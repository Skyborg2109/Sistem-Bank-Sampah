<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_user_tabel', function (Blueprint $table) {
            $table->id();
            $table->string('nama_user');
            $table->string('username')->unique();
            $table->string('email')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'petugas', 'Warga'])->default('Warga');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_user_tabel');
    }
};
