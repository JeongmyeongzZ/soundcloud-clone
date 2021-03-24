<?php

declare(strict_types=1);

namespace App\Domains\Like\Interfaces\Web\Controllers;

use App\Domains\Like\Interfaces\Web\Requests\AddLikeRequest;
use App\Domains\Like\Services\LikeService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use ReflectionException;

class AddLikeController extends Controller
{
    /**
     * @var LikeService
     */
    private LikeService $service;

    /**
     * LikeController constructor.
     * @param LikeService $service
     */
    public function __construct(LikeService $service)
    {
        $this->service = $service;
    }

    /**
     * @param AddLikeRequest $request
     * @return Response
     * @throws ReflectionException
     */
    public function __invoke(AddLikeRequest $request): Response
    {
        $this->service->add($request->toRequestObject());

        return response()->noContent(Response::HTTP_OK);
    }
}
