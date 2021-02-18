<?php

namespace App\Domains\Track\Interfaces\Web\Requests;

use App\Http\Requests\MapHttpRequest;
use Illuminate\Foundation\Http\FormRequest;
use ReflectionException;

class SaveTrackRequest extends FormRequest
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
        $this->json()->set('trackId', $this->route()->parameter('trackId'));

        return $this->mapHttpRequestToRequestObject(
            $this->json(),
            \App\Domains\Track\Requests\SaveTrackRequest::class
        );
    }
}
