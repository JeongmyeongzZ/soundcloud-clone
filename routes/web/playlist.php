<?php


use App\Domains\Playlist\Interfaces\Web\Controllers\SavePlaylistController;

Route::post('/playlists', SavePlaylistController::class)->name('playlists.create');

