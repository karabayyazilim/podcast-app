<?php

namespace App\Services;

use App\Models\Speaker;
use Illuminate\Support\Facades\Storage;

class SpeakerService
{
    public function store($request)
    {
        $img_path = $request->file('avatar')->store('speakers', 'public');
        Speaker::create([
            'name' => $request->name,
            'avatar' => $img_path,
            'description' => $request->description,
            'job' => $request->job,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
        ]);
    }

    public function update($request, $id)
    {
        $request->hasFile('avatar') ? $img_path = $request->file('avatar')->store('speakers', 'public') : null;
        $speaker = Speaker::find($id);
        $speaker->name = $request->name;
        $request->hasFile('avatar') ? $speaker->avatar = $img_path : null;
        $speaker->description = $request->description;
        $speaker->job = $request->job;
        $speaker->linkedin = $request->linkedin;
        $speaker->twitter = $request->twitter;
        $speaker->instagram = $request->instagram;
        $speaker->save();
    }

    public function destroy($id)
    {
        $speaker = Speaker::find($id);
        Storage::disk('public')->delete($speaker->avatar);
        $speaker->delete();
    }
}
