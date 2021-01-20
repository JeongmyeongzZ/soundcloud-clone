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
        /**
         * @var User $user
         */
        $user = User::factory()->createOne();

        $response = $this->actingAs($user)
            ->postJson(
                route('tracks.create'),
                [
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
