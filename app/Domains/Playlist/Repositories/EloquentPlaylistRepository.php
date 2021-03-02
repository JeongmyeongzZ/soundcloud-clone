<?php

declare(strict_types=1);

namespace App\Domains\Playlist\Repositories;

use App\Domains\Playlist\Models\Playlist;
use App\Repositories\EloquentRepository;

class EloquentPlaylistRepository extends EloquentRepository implements PlaylistRepository
{
    /**
     * @param Playlist $playlist
     * @return Playlist
     */
    public function create(Playlist $playlist): Playlist
    {
        $this->save($playlist);

        return $playlist;
    }
}
