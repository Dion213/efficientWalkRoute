<?php

namespace Database\Factories;

use App\Models\ShoppingList;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WalkRoute>
 */
class WalkRouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'route' => '',
            'shopping_list_id' => ShoppingList::factory(),
        ];
    }
}
