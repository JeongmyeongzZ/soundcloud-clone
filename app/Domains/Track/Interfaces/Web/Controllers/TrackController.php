<?php

declare(strict_types=1);

namespace App\Domains\Track\Interfaces\Web\Controllers;

use App\Domains\Track\Interfaces\Web\Requests\SaveTrackRequest;
use App\Domains\Track\Requests\SaveTrackRequest as SaveTrackRequestObject;
use App\Domains\Track\Services\TrackService;
use App\Http\Controllers\Controller;
use ReflectionException;

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
     * @throws ReflectionException
     */
    public function store(SaveTrackRequest $request)
    {
        $a = $this->mapHttpRequestToRequestObject($request, SaveTrackRequestObject::class);
        $this->service->save($this->mapHttpRequestToRequestObject($request, SaveTrackRequestObject::class));
    }
}
