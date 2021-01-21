<?php

declare(strict_types=1);

namespace App\Domains\Like\Providers;

use App\Domains\Like\Models\Like;
use App\Domains\Like\Repositories\EloquentLikeRepository;
use App\Domains\Like\Repositories\LikeRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class LikeServiceProvider extends ServiceProvider
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
            LikeRepository::class,
            function (Application $app) {
                return new EloquentLikeRepository(new Like());
            }
        );
    }
}
