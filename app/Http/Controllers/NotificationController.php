<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //dd('Desde notification controller');

        // only unread notifications
        $notifications = auth()->user()->unreadNotifications;

        //clear notifications
        auth()->user()->unreadNotifications->markAsRead();

        return view('notifications.index',[
            'notifications' => $notifications,
        ]);
    }
}
