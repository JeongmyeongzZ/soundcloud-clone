<?php

namespace App\Domains\Track\Interfaces\Web\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveTrackRequest extends FormRequest
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
            'userId' => 'required|numeric|min:1',
            'title' => 'required|string|max:60',
            'artworkUrl' => 'required|string|url',
        ];
    }
}
