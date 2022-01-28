<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\Speaker;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'feeds' => Feed::latest()->paginate(5),
            'latestFeed' => Feed::latest()->first(),
            'speakers' => Speaker::all(),
        ]);
    }

    public function feed()
    {
        $feeds = Feed::latest()->get();
        $now = Carbon::now()->toAtomString();
        $content = view('feeds.xml', compact('feeds', 'now'));
        return response($content)->header('Content-Type', 'application/xml');
    }

    public function feedDetail($rss_id)
    {
        $feed = Feed::findOrFail($rss_id);
        $now = Carbon::now()->toAtomString();
        $content = view('feeds.xml-detail', compact('feed', 'now'));
        return response($content)->header('Content-Type', 'application/xml');
    }
}
