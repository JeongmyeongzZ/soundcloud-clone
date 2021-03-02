<?php

namespace App\Domains\Playlist\Interfaces\Web\Requests;

use App\Http\Requests\MapHttpRequest;
use Illuminate\Foundation\Http\FormRequest;
use ReflectionException;

class SavePlaylistRequest extends FormRequest
{
    use MapHttpRequest;

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
            'genre' => 'required|string',
            'description' => 'required|string',
            'is_private' => 'required|bool',
            'release_date' => 'required|date',
        ];
    }

    /**
     * Map with custom request object class.
     *
     * @return mixed|object
     * @throws ReflectionException
     */
    public function toRequestObject()
    {
        return $this->mapHttpRequestToRequestObject(
            $this->json(),
            \App\Domains\Playlist\Requests\SavePlaylistRequest::class
        );
    }
}
