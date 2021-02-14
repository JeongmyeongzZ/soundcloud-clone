<?php

namespace App\Domains\Like\Interfaces\Web\Requests;

use App\Domains\Track\Models\Track;
use App\Http\Requests\MapHttpRequest;
use Illuminate\Foundation\Http\FormRequest;
use ReflectionException;

class AddLikeRequest extends FormRequest
{
    use MapHttpRequest;

    /**
     * @inheritDoc
     */
    public function validationData(): array
    {
        return array_merge($this->json()->all(), $this->route()->parameters());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $trackClass = Track::class;

        return [
            'trackId' => "required|exists:${trackClass},id",
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
            \App\Domains\Like\Requests\AddLikeRequest::class
        );
    }
}
