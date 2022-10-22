<?php

namespace Database\Factories;

use App\Models\Candidate;
use App\Models\Offer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => fake()->uuid(),
            'offer_id' => Offer::inRandomOrder()->first(),
            'candidate_id' => Candidate::inRandomOrder()->first(),
            'annotations' => fake()->realText(),
            'status' => fake()->biasedNumberBetween(1, 4),
        ];
    }
}
