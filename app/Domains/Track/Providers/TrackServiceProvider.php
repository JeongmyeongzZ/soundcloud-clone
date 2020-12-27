<?php

declare(strict_types=1);

namespace App\Domains\Track\Providers;

use App\Domains\Track\Models\Track;
use App\Domains\Track\Repositories\EloquentTrackRepository;
use App\Domains\Track\Repositories\TrackRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class TrackServiceProvider extends ServiceProvider
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
            TrackRepository::class,
            function (Application $app) {
                return new EloquentTrackRepository(new Track());
            }
        );
    }
}
