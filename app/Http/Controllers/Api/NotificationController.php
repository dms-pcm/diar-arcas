<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }

    public function index()
    {
        $notifications = Auth::user()->Notifications;
        $countNotifications = Auth::user()->unreadNotifications()->count();

        $this->responseCode = 200;
        $this->responseMessage = 'Data notifikasi.';
        $this->responseData['notifications'] = $notifications;
        $this->responseData['count_notifikasi'] = $countNotifications;
        

        return response()->json($this->getResponse(), $this->responseCode);
    }

    public function markAsRead(Request $request)
    {
        $notification = Auth::user()->unreadNotifications->find($request->id);

        if (!empty($notification)) {
            $notification->markAsRead();
        }

        $this->responseCode = 200;
        $this->responseMessage = 'READ';

        return response()->json($this->getResponse(), $this->responseCode);
    }

    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();

        $this->responseCode = 200;
        $this->responseMessage = 'MARK_ALL_AS_SREAD';

        return response()->json($this->getResponse(), $this->responseCode);
    }

    public function store(Request $request)
    {
        Auth::user()->unreadNotifications->when($request->id, function ($query, $id) {
            return $query->where('id', $id);
        })->markAsRead();

        $this->responseCode = 200;
        $this->responseMessage = 'Mark as read.';

        return response()->json($this->getResponse(), $this->responseCode);
    }
}
