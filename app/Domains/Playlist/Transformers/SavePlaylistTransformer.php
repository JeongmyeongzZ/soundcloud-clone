<?php


namespace App\Domains\Playlist\Transformers;


use App\Domains\Playlist\Models\Playlist;
use League\Fractal\TransformerAbstract;

class SavePlaylistTransformer extends TransformerAbstract
{
    public function transform(Playlist $playlist): array
    {
        return [
            'id' => (int) $playlist->id,
        ];
    }
}
