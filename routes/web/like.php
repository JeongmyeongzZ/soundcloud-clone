<?php

use App\Domains\Like\Interfaces\Web\Controllers\AddLikeController;

Route::post('tracks/{trackId}/like', AddLikeController::class)->name('likes.like-track');
