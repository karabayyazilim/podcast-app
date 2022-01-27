<?php

namespace App\Services;

use App\Models\Feed;
use Illuminate\Support\Facades\Storage;

class FeedService
{
    public function store($request)
    {
        $img_path = $request->file('image')->store('feeds/images', 'public');
        $src_path = $request->file('src_url')->store('feeds/sounds', 'public');
        Feed::create([
            'title' => $request->title,
            'description' => $request->description,
            'src_url' => $src_path,
            'user_id' => auth()->id(),
            'image' => $img_path,
        ]);
    }

    public function update($request, $id)
    {
        $request->hasFile($request->image) ? $img_path = $request->file('image')->store('feeds/images', 'public') : null;
        $request->hasFile($request->src_url) ? $src_path = $request->file('src_url')->store('feeds/sounds', 'public') : null;
        $feed = Feed::find($id);
        $feed->title = $request->title;
        $feed->description = $request->description;
        $feed->rss_url = 'aa';
        $feed->user_id = auth()->id();
        $request->hasFile($request->src_url) ? $feed->src_url = $src_path : null;
        $request->hasFile($request->image) ? $feed->image = $img_path : null;
        $feed->save();
    }

    public function destroy($id)
    {
        $feed = Feed::findOrFail($id);
        Storage::disk('public')->delete($feed->image);
        Storage::disk('public')->delete($feed->src_url);
        $feed->delete();
    }
}
