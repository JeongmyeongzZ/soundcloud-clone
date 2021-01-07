<?php


namespace Tests\Feature\Track\Http;


use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTrackTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function create_track()
    {
        $user = User::create();

        $response = $this->postJson(
            route('tracks.create'),
            [
                'userId' => $user->id,
                'title' => $this->faker->title,
                'artworkUrl' => $this->faker->imageUrl(),
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
