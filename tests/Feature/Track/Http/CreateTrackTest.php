<?php


namespace Tests\Feature\Track\Http;


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTrackTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * @test
     */
    public function create_track()
    {
        /**
         * @var User $user
         */
        $user = User::factory()->createOne();

        $response = $this->actingAs($user)
            ->postJson(
                route('playlists.create'),
                [
                    'title' => $this->faker->title,
                    'artworkUrl' => $this->faker->imageUrl(),
                    'genre' => $this->faker->word,
                    'description' => $this->faker->text(50),
                    'isPrivate' => $this->faker->boolean,
                    'releaseDate' => $this->faker->date(),
                ]
            );

        $response->assertCreated();

        $response->assertJsonStructure([
            'data' => [
                'id',
            ],
        ]);
    }
}
