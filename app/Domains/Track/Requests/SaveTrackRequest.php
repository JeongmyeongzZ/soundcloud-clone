<?php


namespace App\Domains\Track\Requests;


class SaveTrackRequest
{
    private int $userId;
    private string $title;
    private string $artworkUrl;

    /**
     * SaveTrackRequest constructor.
     * @param int $userId
     * @param string $title
     * @param string $artworkUrl
     */
    public function __construct(int $userId, string $title, string $artworkUrl)
    {
        $this->userId = $userId;
        $this->title = $title;
        $this->artworkUrl = $artworkUrl;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getArtworkUrl(): string
    {
        return $this->artworkUrl;
    }
}
