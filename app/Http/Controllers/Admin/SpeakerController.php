<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpeakerStoreRequest;
use App\Http\Requests\SpeakerUpdateRequest;
use App\Models\Speaker;
use App\Services\SpeakerService;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{
    public function __construct(SpeakerService $speakerService)
    {
        $this->speakerService = $speakerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.speakers.index', [
            'speakers' => Speaker::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.speakers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpeakerStoreRequest $request)
    {
        try {
            $this->speakerService->store($request);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function show(Speaker $speaker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function edit(Speaker $speaker)
    {
        return view('admin.speakers.edit', [
           'speaker' => $speaker,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function update(SpeakerUpdateRequest $request, Speaker $speaker)
    {
        try {
            $this->speakerService->update($request, $speaker->id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Speaker $speaker)
    {
        try {
            $this->speakerService->destroy($speaker->id);
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
