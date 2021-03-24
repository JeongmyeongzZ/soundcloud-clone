<?php

use App\Domains\Track\Interfaces\Web\Controllers\SaveTrackController;

Route::post('/tracks', SaveTrackController::class)->name('tracks.create');

