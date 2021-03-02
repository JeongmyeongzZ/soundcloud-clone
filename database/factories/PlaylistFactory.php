<?php

namespace Database\Factories;

use App\Domains\Playlist\Models\Playlist;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaylistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Playlist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::create(),
            'title' => $this->faker->title,
            'genre' => $this->faker->word,
            'artwork_url' => $this->faker->imageUrl(),
            'description' => $this->faker->text(50),
            'is_private' => $this->faker->boolean,
            'release_date' => $this->faker->date(),
        ];
    }
}
