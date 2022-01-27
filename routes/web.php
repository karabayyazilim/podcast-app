<?php

use App\Http\Controllers\Admin\SpeakerController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\FeedController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\IndexController::class, 'index'])->name('home');
Route::get('/feed', [App\Http\Controllers\IndexController::class, 'feed'])->name('feed');
Route::get('/feed/{rss_id}', [App\Http\Controllers\IndexController::class, 'feedDetail'])->name('feed.detail');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\Admin\HomeController::class, 'profile'])->name('profile');
    Route::put('/profile', [App\Http\Controllers\Admin\HomeController::class, 'profileUpdate'])->name('profile.update');
    Route::resource('feed', FeedController::class);
    Route::resource('speaker', SpeakerController::class);
});
