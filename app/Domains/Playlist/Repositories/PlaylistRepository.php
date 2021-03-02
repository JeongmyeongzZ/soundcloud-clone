<?php

declare(strict_types=1);

namespace App\Domains\Playlist\Repositories;


use App\Domains\Playlist\Models\Playlist;

interface PlaylistRepository
{
    /**
     * @param Playlist $playlist
     * @return Playlist
     */
    public function create(Playlist $playlist): Playlist;
}
