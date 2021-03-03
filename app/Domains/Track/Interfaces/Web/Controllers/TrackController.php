<?php

declare(strict_types=1);

namespace App\Domains\Track\Interfaces\Web\Controllers;

use App\Domains\Track\Interfaces\Web\Requests\SaveTrackRequest;
use App\Domains\Track\Requests\SaveTrackRequest as SaveTrackRequestObject;
use App\Domains\Track\Services\TrackService;
use App\Domains\Track\Transformers\SaveTrackTransformer;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use ReflectionException;
use Symfony\Component\HttpFoundation\ParameterBag;

class TrackController extends Controller
{
    /**
     * @var TrackService
     */
    private TrackService $service;

    /**
     * TrackController constructor.
     * @param TrackService $service
     */
    public function __construct(TrackService $service)
    {
        $this->service = $service;
    }

    /**
     * @param SaveTrackRequest $request
     * @return JsonResponse
     * @throws ReflectionException
     */
    public function store(SaveTrackRequest $request): JsonResponse
    {
        return response()->json(
            fractal($this->service->save($request->toRequestObject()), new SaveTrackTransformer())->toArray(),
            Response::HTTP_CREATED
        );
    }
}
