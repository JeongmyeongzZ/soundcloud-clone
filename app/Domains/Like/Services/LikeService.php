<?php

declare(strict_types=1);

namespace App\Domains\Like\Services;

use App\Domains\Like\Models\Like;
use App\Domains\Like\Repositories\LikeRepository;
use App\Domains\Like\Requests\AddLikeRequest;
use App\Domains\Track\Models\Track;
use App\Models\User;

class LikeService
{
    /**
     * @var LikeRepository
     */
    private LikeRepository $repository;

    /**
     * LikeService constructor.
     * @param LikeRepository $repository
     */
    public function __construct(LikeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param AddLikeRequest $request
     * @return void
     */
    public function add(AddLikeRequest $request): void
    {
        /**
         * @var User $user
         */
        $user = auth()->user();

        $like = new Like();
        $like->likeable_type = Track::class;
        $like->likeable_id = $request->getTrackId();

        $user->likes()->save($like);
    }
}
