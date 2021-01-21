<?php

declare(strict_types=1);

namespace App\Domains\Like\Repositories;

use App\Domains\Like\Models\Like;
use App\Repositories\EloquentRepository;

class EloquentLikeRepository extends EloquentRepository implements LikeRepository
{
    /**
     * @param Like $like
     * @return void
     */
    public function add(Like $like): void
    {
        $this->save($like);
    }
}
