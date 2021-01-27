<?php

declare(strict_types=1);

namespace App\Domains\Track\Services;

use App\Domains\Track\Models\Track;
use App\Domains\Track\Repositories\TrackRepository;
use App\Domains\Track\Requests\SaveTrackRequest;

class TrackService
{
    /**
     * @var TrackRepository
     */
    private TrackRepository $repository;

    /**
     * TrackService constructor.
     * @param TrackRepository $repository
     */
    public function __construct(TrackRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param SaveTrackRequest $request
     * @return Track
     */
    public function save(SaveTrackRequest $request): Track
    {
        $track = new Track();
        $track->artwork_url = $request->getArtworkUrl();
        $track->user_id = auth()->user()->getAuthIdentifier();
        $track->title = $request->getTitle();

        return $this->repository->create($track);
    }
}
