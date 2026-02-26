<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class UserPreferencesMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('username')) {
            $username = session('username');
            
            // Coba ambil dari cache session dulu biar hemat query (opsional, tapi bagus untuk performa)
            // if (!session()->has('user_settings')) { ... }
            if (session()->has('user_settings')) {
                $settings = session('user_settings');
            } else {
               // Ambil dari DB
                $settings = DB::table('user_settings')->where('username', $username)->first();
                
                // Default settings jika belum ada
                if (!$settings) {
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
                
                // Simpan ke session
                session(['user_settings' => $settings]);
            }

            // Share ke semua views
            View::share('userSettings', $settings);

            // Set Locale
            App::setLocale($settings->language);

            // Set Timezone (Mapping sederhana)
            $timezoneMap = [
                'WIB' => 'Asia/Jakarta',
                'WITA' => 'Asia/Makassar',
                'WIT' => 'Asia/Jayapura',
            ];
            $tz = $timezoneMap[$settings->timezone] ?? 'Asia/Jakarta';
            Config::set('app.timezone', $tz);
            date_default_timezone_set($tz);
        }

        return $next($request);
    }
}
