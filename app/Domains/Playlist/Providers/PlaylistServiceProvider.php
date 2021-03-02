<?php

declare(strict_types=1);

namespace App\Domains\Playlist\Providers;

use App\Domains\Playlist\Models\Playlist;
use App\Domains\Playlist\Repositories\EloquentPlaylistRepository;
use App\Domains\Playlist\Repositories\PlaylistRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class PlaylistServiceProvider extends ServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register(): void
    {
        $this->registerRepositories();
    }

    /**
     * @return void
     */
    private function registerRepositories(): void
    {
        $this->app->singleton(
            PlaylistRepository::class,
            function (Application $app) {
                return new EloquentPlaylistRepository(new Playlist());
            }
        );
    }
}
