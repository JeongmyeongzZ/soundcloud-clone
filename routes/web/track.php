<?php

use App\Domains\Track\Interfaces\Web\Controllers\TrackController;

Route::middleware('auth')->group(function () {
    Route::post('/tracks', [TrackController::class, 'store'])->name('tracks.create');
});

