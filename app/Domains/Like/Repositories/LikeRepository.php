<?php

declare(strict_types=1);

namespace App\Domains\Like\Repositories;

use App\Domains\Like\Models\Like;
use App\Repositories\EloquentRepository;

class LikeRepository extends EloquentRepository
{
    public function __construct(Like $like)
    {
        $this->model = $like;
    }
}
