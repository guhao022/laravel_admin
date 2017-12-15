<?php

namespace Modules\Admin\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    //
    public function show(DatabaseNotification $notification)
    {

        $notification->markAsRead();

        return view('admin::notification.show',['notification'=>$notification]);
    }
}
