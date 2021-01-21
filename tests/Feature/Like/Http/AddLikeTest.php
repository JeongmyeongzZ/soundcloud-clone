<?php


namespace Tests\Feature\Like\Http;


use App\Domains\Track\Models\Track;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddLikeTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * @test
     */
    public function add_like()
    {
        /**
         * @var User $user
         */
        $user = User::factory()->createOne();

        /**
         * @var Track $track
         */
        $track = Track::factory()->createOne();

        $response = $this->actingAs($user)
            ->postJson(route('likes.like-track', $track->id));

        $response->assertNoContent();
    }
}
