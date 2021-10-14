<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rating::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => Post::query()->inRandomOrder()->value('id'),
            'rating' => $this->faker->randomFloat(2, 1, 10),
        ];
    }
}
