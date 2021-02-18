<?php


namespace App\Domains\Track\Transformers;


use App\Domains\Track\Models\Track;
use League\Fractal\TransformerAbstract;

class SaveTrackTransformer extends TransformerAbstract
{
    public function transform(Track $track): array
    {
        return [
            'id' => (int) $track->id,
        ];
    }
}
