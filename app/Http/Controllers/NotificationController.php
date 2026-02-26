<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    // Get unread notifications for current user
    public function getUnread()
    {
        $role = session('role', 'admin');
        
        $notifications = DB::table('notifications')
            ->where('user_role', $role)
            ->where('is_read', false)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        
        $unreadCount = $notifications->count();
        
        return response()->json([
            'success' => true,
            'count' => $unreadCount,
            'notifications' => $notifications->map(function($notif) {
                return [
                    'id' => $notif->id,
                    'type' => $notif->type,
                    'title' => $notif->title,
                    'message' => $notif->message,
                    'icon' => $notif->icon ?? 'info',
                    'link' => $notif->link,
                    'time' => $this->getTimeAgo($notif->created_at),
                    'created_at' => $notif->created_at
                ];
            })
        ]);
    }
    
    // Mark notification as read
    public function markAsRead($id)
    {
        DB::table('notifications')
            ->where('id', $id)
            ->update(['is_read' => true]);
        
        return response()->json(['success' => true]);
    }
    
    // Mark all as read
    public function markAllAsRead()
    {
        $role = session('role', 'admin');
        
        DB::table('notifications')
            ->where('user_role', $role)
            ->where('is_read', false)
            ->update(['is_read' => true]);
        
        return response()->json(['success' => true]);
    }
    
    // Helper function to get time ago
    private function getTimeAgo($datetime)
    {
        $timestamp = strtotime($datetime);
        $diff = time() - $timestamp;
        
        if ($diff < 60) {
            return 'Baru saja';
        } elseif ($diff < 3600) {
            $minutes = floor($diff / 60);
            return $minutes . ' menit yang lalu';
        } elseif ($diff < 86400) {
            $hours = floor($diff / 3600);
            return $hours . ' jam yang lalu';
        } elseif ($diff < 604800) {
            $days = floor($diff / 86400);
            return $days . ' hari yang lalu';
        } else {
            return date('d M Y', $timestamp);
        }
    }
    
    // Create notification (helper method)
    public static function create($type, $title, $message, $role = 'admin', $link = null, $icon = null)
    {
        DB::table('notifications')->insert([
            'type' => $type,
            'title' => $title,
            'message' => $message,
            'user_role' => $role,
            'link' => $link,
            'icon' => $icon,
            'is_read' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
