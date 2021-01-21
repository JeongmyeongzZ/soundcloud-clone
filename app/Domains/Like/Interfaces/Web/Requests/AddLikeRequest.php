<?php

namespace App\Domains\Like\Interfaces\Web\Requests;

use App\Domains\Track\Models\Track;
use Illuminate\Foundation\Http\FormRequest;

class AddLikeRequest extends FormRequest
{
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
}
