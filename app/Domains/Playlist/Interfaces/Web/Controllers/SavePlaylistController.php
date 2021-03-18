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

class SavePlaylistController extends Controller
{
    /**
     * @var PlaylistService
     */
    private PlaylistService $service;

    /**
     * SavePlaylistController constructor.
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
    public function __invoke(SavePlaylistRequest $request): JsonResponse
    {
        return response()->json(
            fractal($this->service->save($request->toRequestObject()), new SavePlaylistTransformer())->toArray(),
            Response::HTTP_CREATED
        );
    }
}
