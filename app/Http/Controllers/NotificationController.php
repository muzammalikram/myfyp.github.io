<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function get_notifications() {
        $id = auth()->user()->id;
        $notifications = Notification::where('notifiable_id' , $id)->get();
       // return $notifications;
        dd($notifications);
$data =        $notifications->data;
        return response()->json($data);
    }
}
