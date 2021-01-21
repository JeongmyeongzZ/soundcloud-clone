<?php


namespace App\Domains\Like\Requests;


class AddLikeRequest
{
    private int $trackId;

    /**
     * AddLikeRequest constructor.
     * @param int $trackId
     */
    public function __construct(int $trackId)
    {
        $this->trackId = $trackId;
    }

    /**
     * @return int
     */
    public function getTrackId(): int
    {
        return $this->trackId;
    }
}
