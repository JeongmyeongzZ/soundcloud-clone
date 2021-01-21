<?php

declare(strict_types=1);

namespace App\Domains\Like\Repositories;

use App\Domains\Like\Models\Like;

interface LikeRepository
{
    /**
     * @param Like $like
     * @return void
     */
    public function add(Like $like): void;
}
