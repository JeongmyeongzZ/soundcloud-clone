<?php

use App\Domains\Like\Interfaces\Web\Controllers\LikeController;

Route::post('tracks/{trackId}/like', [LikeController::class, 'store'])->name('likes.like-track');
