<?php

declare(strict_types=1);

namespace App\Domains\Track\Repositories;


use App\Domains\Track\Models\Track;

interface TrackRepository
{
    /**
     * @param Track $track
     * @return Track
     */
    public function create(Track $track): Track;
}
