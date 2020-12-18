<?php

declare(strict_types=1);

namespace App\Domains\Track\Repositories;

use App\Domains\Track\Track;
use App\Repositories\EloquentRepository;

class TrackRepository extends EloquentRepository
{
    public function __construct(Track $track)
    {
        $this->model = $track;
    }
}
