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
        $feed = Feed::find($id);
        $feed->title = $request->title;
        $feed->description = $request->description;
        $feed->user_id = auth()->id();
        if ($request->hasFile('image'))
        {
            $img_path = $request->file('image')->store('feeds/images', 'public');
            $feed->image = $img_path;
        }
        if ($request->hasFile('src_url'))
        {
            $src_path = $request->file('src_url')->store('feeds/sounds', 'public');
            $feed->src_url = $src_path;
        }
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
