<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
            'image' => 'required|file|mimes:jpg,jpeg,png',
            'src_url' => 'required|file|mimes:mp3,vav,wv',
        ];
    }
}
