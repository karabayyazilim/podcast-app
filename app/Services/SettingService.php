<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class SettingService
{
    public function store($request)
    {
        Setting::create([
            'key' => $request->key,
            'value' => $request->value,
            'type' => $request->type
        ]);
    }

    public function update($request, $setting)
    {
        if ($request->hasFile('value')) {
            Storage::disk('public')->delete($setting->image);
            $path = $request->file('value')->store('setting/images', 'public');
            $setting->update([
                'value' => $path,
            ]);
        } else {
            $setting->update([
                'value' => $request->value,
            ]);
        }
    }

    public function destroy($setting)
    {
        Storage::disk('public')->delete($setting->value);
        $setting->delete();
    }
}
