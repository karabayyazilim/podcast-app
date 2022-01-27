<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'file|mimes:jpg,jpeg,png',
            'src_url' => 'file|mimes:mp3,vav,wv',
        ];
    }
}
