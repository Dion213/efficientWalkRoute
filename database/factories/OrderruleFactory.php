<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orderrule>
 */
class OrderruleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_id' => Order::factory(),
            'article_id' => Article::query()->inRandomOrder()->first() ?? Article::factory(),
            'amount' => rand(1, 10),
        ];
    }
}
