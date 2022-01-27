<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\Speaker;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'feeds' => Feed::latest()->paginate(5),
            'latestFeed' => Feed::latest()->first(),
            'speakers' => Speaker::latest()->get(),
        ]);
    }
}
