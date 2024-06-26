<?php

namespace App\Http\Controllers\App;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Setting\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('app.pages.settings.index', compact('settings'));
    }

    public function create()
    {
        return view('app.pages.settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|unique:settings,key',
            'value' => 'nullable',
        ]);

        Setting::create($request->all());

        return redirect()->route('settings.index')->with('success', 'Setting created successfully.');
    }

    public function edit(Setting $setting)
    {
        return view('app.pages.settings.edit', compact('setting'));
    }

    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $validated = $request->validated();

        foreach ($validated as $key => $value) {
            Setting::updateOrInsert(
                ['key' => $key],
                ['value' => $value]
            );
        }

        Cache::forget('settings');

        return Response::json(['code' => 1, 'message' => __('Ayarlar başarıyla güncellendi.')], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();

        return redirect()->route('settings.index')->with('success', 'Setting deleted successfully.');
    }
}
