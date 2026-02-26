<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_settings', function (Blueprint $table) {
            $table->id();
            $table->string('username')->index();
            $table->string('language')->default('id');
            $table->string('timezone')->default('WIB');
            $table->boolean('email_notifications')->default(true);
            $table->boolean('push_notifications')->default(true);
            $table->boolean('sound_notifications')->default(true);
            $table->boolean('dark_mode')->default(false);
            $table->boolean('compact_sidebar')->default(false);
            $table->timestamps();

            // Opsional: tambahkan foreign key jika tabel user menggunakan id atau username sebagai key yang proper
            // $table->foreign('username')->references('username')->on('data_user_tabel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_settings');
    }
};
