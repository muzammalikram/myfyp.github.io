<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request; 

class NotificationController extends Controller
{
    //
    public function get_notifications() {
    	$id = auth()->user()->id;
    	 $count = auth()->user()->unreadNotifications->count();
//    	$count = auth()->user()->unreadNotifications->count();
    	 $notifications = auth()->user()->notifications;

    	 
      return response()->json(['count' => $count , 'all_notifications' => $notifications]);
    }
}
