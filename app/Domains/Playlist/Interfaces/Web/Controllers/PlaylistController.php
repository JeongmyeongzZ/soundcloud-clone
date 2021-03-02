<?php

declare(strict_types=1);

namespace App\Domains\Playlist\Interfaces\Web\Controllers;

use App\Domains\Playlist\Interfaces\Web\Requests\SavePlaylistRequest;
use App\Domains\Playlist\Services\PlaylistService;
use App\Domains\Playlist\Transformers\SavePlaylistTransformer;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use ReflectionException;

class PlaylistController extends Controller
{
    /**
     * @var PlaylistService
     */
    private PlaylistService $service;

    /**
     * PlaylistController constructor.
     * @param PlaylistService $service
     */
    public function __construct(PlaylistService $service)
    {
        $this->service = $service;
    }

    /**
     * @param SavePlaylistRequest $request
     * @return JsonResponse
     * @throws ReflectionException
     */
    public function store(SavePlaylistRequest $request): JsonResponse
    {
        return response()->json(
            fractal($this->service->save($request->toRequestObject()), SavePlaylistTransformer::class)->toArray(),
            Response::HTTP_CREATED
        );
    }
}
