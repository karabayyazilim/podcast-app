<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedStoreRequest;
use App\Models\Feed;
use App\Services\FeedService;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function __construct(FeedService $feedService)
    {
        $this->feedService = $feedService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.feeds.index', [
            'feeds' => Feed::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.feeds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedStoreRequest $request)
    {
        try {
            $this->feedService->store($request);
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
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function show(Feed $feed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function edit(Feed $feed)
    {
        return view('admin.feeds.edit', [
            'feed' => $feed,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\FeedUpdateRequest  $request
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function update(FeedUpdateRequest $request, Feed $feed)
    {
        try {
            $this->feedService->update($request, $feed->id);
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
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feed $feed)
    {
        try {
            $this->feedService->destroy($feed->id);
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
