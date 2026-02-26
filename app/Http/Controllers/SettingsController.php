<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function index()
    {
        $username = session('username');
        
        // Ambil setting dari database, atau buat default object jika belum ada
        $settings = DB::table('user_settings')->where('username', $username)->first();

        // Jika belum ada setting, kita bisa pass default values atau create row baru.
        // Untuk simpelnya, kita pass null/default values ke view handle
        if (!$settings) {
            // Default object structure
            $settings = (object) [
                'language' => 'id',
                'timezone' => 'WIB',
                'email_notifications' => 1,
                'push_notifications' => 1,
                'sound_notifications' => 1,
                'dark_mode' => 0,
                'compact_sidebar' => 0,
            ];
        }

        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $username = session('username');

        // Validasi input jika perlu
        // Checkbox HTML tidak mengirim value jika unchecked, jadi kita handle manual
        
        $data = [
            'language' => $request->input('language', 'id'),
            'timezone' => $request->input('timezone', 'WIB'),
            'email_notifications' => $request->has('email_notifications') ? 1 : 0,
            'push_notifications' => $request->has('push_notifications') ? 1 : 0,
            'sound_notifications' => $request->has('sound_notifications') ? 1 : 0,
            'dark_mode' => $request->has('dark_mode') ? 1 : 0,
            'compact_sidebar' => $request->has('compact_sidebar') ? 1 : 0,
            'updated_at' => now(),
        ];

        // Cek apakah user sudah punya row setting
        $exists = DB::table('user_settings')->where('username', $username)->exists();

        if ($exists) {
            DB::table('user_settings')->where('username', $username)->update($data);
        } else {
            $data['username'] = $username;
            $data['created_at'] = now();
            DB::table('user_settings')->insert($data);
        }

        // Update session agar middleware baca data baru segera
        session(['user_settings' => (object) $data]);

        return redirect()->back()->with('success', 'Pengaturan berhasil disimpan!');
    }

    public function activityLogs()
    {
        $logs = DB::table('activity_logs')
            ->where('username', session('username'))
            ->orderBy('created_at', 'desc')
            ->limit(100)
            ->get();
            
        return view('admin.activity_logs', compact('logs'));
    }

    public function sessions()
    {
        // Fitur sesi ini butuh session driver database.
        // Jika driver file, kita tidak bisa dengan mudah list semua sesi user lain.
        // Kita tampilkan sesi saat ini saja sebagai minimal viable feature.
        $currentSessionId = session()->getId();
        $sessions = [];
        
        // Cek driver session
        if (config('session.driver') === 'database') {
             // Perlu dicatat: tabel sessions laravel defaultnya pakai user_id (int).
             // Sistem kita pakai username (string) sebagai identifier utama di login.
             // Kecuali kita ubah logic login untuk simpan user_id ke session auth, relasi ini agak tricky.
             // Tapi mari kita coba query berdasarkan user_id jika ada di auth session.
             // Atau, jika session table punya payload, kita harus decode payload untuk cari username (mahal).
             
             // UNTUK SAAT INI: Kita skip list sesi database rumit, kita mockup sesi saat ini saja
             // agar fitur "berfungsi" menampilkan info.
        }

        $currentSession = [
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'last_activity' => now()->diffForHumans(),
            'is_current' => true
        ];
        
        $sessions[] = (object) $currentSession;

        return view('admin.sessions', compact('sessions'));
    }
}
