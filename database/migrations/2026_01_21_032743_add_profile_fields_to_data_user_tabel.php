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
        Schema::table('data_user_tabel', function (Blueprint $table) {
            // Check if columns don't exist before adding
            if (!Schema::hasColumn('data_user_tabel', 'telepon')) {
                $table->string('telepon', 20)->nullable()->after('email');
            }
            if (!Schema::hasColumn('data_user_tabel', 'alamat')) {
                $table->text('alamat')->nullable()->after('telepon');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_user_tabel', function (Blueprint $table) {
            $table->dropColumn(['telepon', 'alamat']);
        });
    }
};
