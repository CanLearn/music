<?php

namespace App\Http\Requests\Manager\Bio;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => ['nullable']  ,
            'images_title' => ['nullable']  ,
            'name' => ['nullable']  ,
            'last_name' => ['nullable']  ,
            'coption_music' => ['nullable']  ,
            'first_image' => ['nullable']  ,
            'title_image' => ['nullable']  ,
            'coption_two_music' => ['nullable']  ,
            'seconde_image' => ['nullable']  ,
            'title_two_image' => ['nullable']  ,
            'license' => ['nullable']  ,
            'concert_image' => ['nullable']  ,
            'title_concert_image' => ['nullable']  ,
            'list_album' => ['nullable']  ,
            'list_music' => ['nullable']  ,
            'tags' => ['nullable']  ,
        ];
    }
}
