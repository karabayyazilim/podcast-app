<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function profile()
    {
        return view('admin.profile', ['user' => Auth::user()]);
    }

    public function profileUpdate(Request $request)
    {
        try {
            $user = User::find(Auth::id());
            $user->name = $request->name;
            isset($request->password) ? $user->password = Hash::make($request->password) : null;
            $user->save();
            return response([
                'status' => true,
                'title' => __('Başarılı'),
                'message' => __('İşleminiz başarılı bir şekilde gerçekleştirildi.')
            ]);
        } catch (\Exception $ex) {
            return response([
                'status' => false,
                'title' => __('Başarısız'),
                'message' => __('İşleminiz gerçekleştirilirken bir hata ile karşılaşıldı. Lütfen tekrar deneyiniz.')
            ]);
        }
    }
}
