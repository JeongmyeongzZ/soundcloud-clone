<?php


use App\Domains\Playlist\Interfaces\Web\Controllers\PlaylistController;

Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.create');

