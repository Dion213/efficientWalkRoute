<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\ShoppingList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShoppingListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShoppingList::factory()
            ->for(
                Order::factory()
                    ->count(rand(2, 5))
            )
            ->count(5)
            ->create();
    }
}
