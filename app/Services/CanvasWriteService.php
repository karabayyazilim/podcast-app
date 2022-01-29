<?php

namespace App\Services;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CanvasWriteService
{
    public function handle($text, $description)
    {
        $filePath = '/feeds/images/'. Str::random(40). '.jpeg';

        $img = Image::make(public_path('assets/images/canvas.jpg'));
        $img->text($text, 252.5, 255.5, function($font) {
            $font->file(public_path('assets/fonts/ubuntu/Ubuntu-Medium.ttf'));
            $font->size(28);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $img->text($description, 252.5, 300, function($font) {
            $font->file(public_path('assets/fonts/ubuntu/Ubuntu-Medium.ttf'));
            $font->size(18);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $img->save(storage_path('app/public/' . $filePath));
        return $filePath;
    }
}
