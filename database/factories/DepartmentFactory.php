<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'verzorgingsproducten',
                'rijst en deegwaren',
                'huishoudproducten',
                'zuivelproducten',
                'alcoholische dranken',
                'vegetarische producten',
                'conserven',
                'frissdranken',
            ]),
            'order' => $this->faker->unique()->numberBetween(1, 10),
        ];
    }
}
