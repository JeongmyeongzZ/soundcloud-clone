<?php


namespace App\Domains\Playlist\Requests;


class SavePlaylistRequest
{
    private string $title;
    private string $artworkUrl;
    private string $genre;
    private string $description;
    private string $isPrivate;
    private string $releaseDate;

    /**
     * SavePlaylistRequest constructor.
     * @param  string  $title
     * @param  string  $artworkUrl
     * @param  string  $genre
     * @param  string  $description
     * @param  string  $isPrivate
     * @param  string  $releaseDate
     */
    public function __construct(
        string $title,
        string $artworkUrl,
        string $genre,
        string $description,
        string $isPrivate,
        string $releaseDate
    ) {
        $this->title = $title;
        $this->artworkUrl = $artworkUrl;
        $this->genre = $genre;
        $this->description = $description;
        $this->isPrivate = $isPrivate;
        $this->releaseDate = $releaseDate;
    }

    /**
     * @return string
     */
    public function getGenre(): string
    {
        return $this->genre;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getIsPrivate(): string
    {
        return $this->isPrivate;
    }

    /**
     * @return string
     */
    public function getReleaseDate(): string
    {
        return $this->releaseDate;
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
