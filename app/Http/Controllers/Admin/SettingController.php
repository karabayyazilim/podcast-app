<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function index()
    {
        return view('admin.settings.index', [
           'settings' => Setting::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        try {
            $this->settingService->store($request);
            return response([
                'status' => true,
                'title' => __('Başarılı'),
                'message' => __('İşleminiz başarılı bir şekilde gerçekleştirildi.')
            ]);
        } catch (\Exception $ex) {
            echo $ex;
            return response([
                'status' => false,
                'title' => __('Başarısız'),
                'message' => __('İşleminiz gerçekleştirilirken bir hata ile karşılaşıldı. Lütfen tekrar deneyiniz.')
            ]);
        }
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', [
            'setting' => $setting
        ]);
    }

    public function update(Request $request, Setting $setting)
    {
        try {
            $this->settingService->update($request, $setting);
            return response([
                'status' => true,
                'title' => __('Başarılı'),
                'message' => __('İşleminiz başarılı bir şekilde gerçekleştirildi.')
            ]);
        } catch (\Exception $ex) {
            echo $ex;
            return response([
                'status' => false,
                'title' => __('Başarısız'),
                'message' => __('İşleminiz gerçekleştirilirken bir hata ile karşılaşıldı. Lütfen tekrar deneyiniz.')
            ]);
        }
    }

    public function destroy(Setting $setting)
    {
        try {
            $this->settingService->destroy($setting);
            return response([
                'status' => true,
                'title' => __('Başarılı'),
                'message' => __('İşleminiz başarılı bir şekilde gerçekleştirildi.')
            ]);
        } catch (\Exception $ex) {
            echo $ex;
            return response([
                'status' => false,
                'title' => __('Başarısız'),
                'message' => __('İşleminiz gerçekleştirilirken bir hata ile karşılaşıldı. Lütfen tekrar deneyiniz.')
            ]);
        }
    }
}
