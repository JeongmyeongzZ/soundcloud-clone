<?php


namespace Tests\Feature\Playlist\Http;


use App\Domains\Track\Models\Track;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddPlaylistTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * @test
     */
    public function add_Playlist()
    {
        /**
         * @var User $user
         */
        $user = User::factory()->createOne();

        $response = $this->actingAs($user)
            ->postJson(
                route('Playlists.Playlist-track'),
                [
                    'title' => $this->faker->title,
                    'artworkUrl' => $this->faker->imageUrl(),
                ]
            );

        $response->assertOk();
    }
}
