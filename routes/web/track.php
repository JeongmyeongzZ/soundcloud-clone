<?php

use App\Domains\Track\Interfaces\Web\Controllers\TrackController;

Route::post('/tracks', [TrackController::class, 'store'])->name('tracks.create');
