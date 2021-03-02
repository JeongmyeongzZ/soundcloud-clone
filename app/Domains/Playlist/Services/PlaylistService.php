<?php

declare(strict_types=1);

namespace App\Domains\Playlist\Services;

use App\Domains\Playlist\Models\Playlist;
use App\Domains\Playlist\Repositories\PlaylistRepository;
use App\Domains\Playlist\Requests\SavePlaylistRequest;

class PlaylistService
{
    /**
     * @var PlaylistRepository
     */
    private PlaylistRepository $repository;

    /**
     * PlaylistService constructor.
     * @param PlaylistRepository $repository
     */
    public function __construct(PlaylistRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param SavePlaylistRequest $request
     * @return Playlist
     */
    public function save(SavePlaylistRequest $request): Playlist
    {
        $playlist = new Playlist();
        $playlist->artwork_url = $request->getArtworkUrl();
        $playlist->user_id = auth()->user()->getAuthIdentifier();
        $playlist->title = $request->getTitle();
        $playlist->genre = $request->getGenre();
        $playlist->description = $request->getDescription();
        $playlist->is_private = $request->getIsPrivate();
        $playlist->release_date = $request->getReleaseDate();

        return $this->repository->create($playlist);
    }
}
