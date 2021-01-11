<?php

declare(strict_types=1);

namespace App\Domains\Track\Repositories;

use App\Domains\Track\Models\Track;
use App\Repositories\EloquentRepository;

class EloquentTrackRepository extends EloquentRepository implements TrackRepository
{
    /**
     * @param Track $track
     * @return Track
     */
    public function create(Track $track): Track
    {
        $this->save($track);

        return $track;
    }
}
