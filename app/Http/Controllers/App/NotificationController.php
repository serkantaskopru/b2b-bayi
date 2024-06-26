<?php

namespace App\Http\Controllers\App;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Setting\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;

class NotificationController extends Controller
{
    public function markAsRead(Request $request): \Illuminate\Http\JsonResponse
    {
        $notificationId = $request->input('id');

        $notification = auth()->user()->notifications()->find($notificationId);

        if ($notification) {
            $notification->markAsRead();
            return Response::json(['code' => 1, 'message' => __('Bildirim okundu olarak işaretlendi.')], 200, [], JSON_UNESCAPED_UNICODE);
        }
        return Response::json(['code' => 0, 'message' => __('Bildirim bulunamadı.')], 404, [], JSON_UNESCAPED_UNICODE);
    }
}
