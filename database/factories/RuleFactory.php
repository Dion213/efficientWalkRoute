<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rule>
 */
class RuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word.' Rule',
            'description' => $this->faker->sentence,
            'type' => $this->faker->randomElement([
                'days',
                'not_available',
                'min_required',
                'max_allowed'
            ]),
            'article_id' => Article::factory(),
            'min_amount_required' => 3,
            'max_amount_allowed' => null,
            'weekdays' => null,
            'not_available_from' => null,
            'not_available_until' => null,
        ];
    }
}
