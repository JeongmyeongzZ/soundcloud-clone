<?php

namespace App\Domains\Track\Interfaces\Web\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveTrackRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:60',
            'artworkUrl' => 'required|string|url',
        ];
    }
}
