<?php


namespace App\Domains\Track\Requests;


class SaveTrackRequest
{
    private string $title;
    private string $artworkUrl;

    /**
     * SaveTrackRequest constructor.
     * @param string $title
     * @param string $artworkUrl
     */
    public function __construct(string $title, string $artworkUrl)
    {
        $this->title = $title;
        $this->artworkUrl = $artworkUrl;
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
