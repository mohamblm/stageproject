<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class NotificationController extends Controller
{
    /**
     * Get all notifications for the authenticated user
     */
    public function index()
    {
        
        $notifications = Notification::all();
        $unreadCount=Notification::whereNull('read_at')->count();
        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $unreadCount
        ]);
    }
    
    /**
     * Mark a notification as read
     */
    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->read_at=now();
        $notifications = Notification::all();
        $unreadCount=Notification::whereNull('read_at')->count();
        
        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $unreadCount
        ],200);
    }
    
    /**
     * Mark all notifications as read
     */
    public function markAllAsRead()
    {
        Notification::whereNull('read_at')->update(['read_at' => now()]);
        $notifications = Notification::all();
        $unreadCount=Notification::whereNull('read_at')->count();
        
        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $unreadCount
        ],200);
    }
    
    /**
     * Show all notifications page
     */
    public function showAll()
    {
        $notifications = Notification::all();
        $unreadCount=Notification::whereNull('read_at')->count();
        
        
        return view('admin.layouts.partials.all-notifications', compact('notifications','unreadCount'));
    }


    public function delete($id)
    {
        $notification = Notification::find($id);
        $notification->delete();

        $unreadCount=Notification::whereNull('read_at')->count();
        $notifications = Notification::all();
        
        
        return view('admin.layouts.partials.all-notifications', compact('notifications','unreadCount'));
    }

}