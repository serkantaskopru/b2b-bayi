<?php
use Illuminate\Support\Facades\Cache;
use App\Models\Setting;

if (!function_exists('settings')) {
    function settings($key = null, $default = null)
    {
        $settings = Cache::remember('settings', 60 * 60, function () {
            return Setting::all()->pluck('value', 'key')->toArray();
        });

        if ($key === null) {
            return $settings;
        }

        return $settings[$key] ?? $default;
    }
}
/*if (!function_exists('get_notifications')) {
    function get_notifications()
    {
        if (auth()->check()) {
            return auth()->user()->unreadNotifications;
        }

        return collect();
    }
}*/
if (!function_exists('get_all_notifications')) {
    function get_all_notifications(): array
    {
        if (auth()->check()) {
            $user = auth()->user();
            $unreadNotifications = $user->unreadNotifications;
            $readNotifications = $user->readNotifications;

            return [
                'unread' => $unreadNotifications,
                'read' => $readNotifications,
            ];
        }

        return [
            'unread' => collect(),
            'read' => collect(),
        ];
    }
}
