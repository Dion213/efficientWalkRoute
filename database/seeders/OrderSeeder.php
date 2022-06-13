<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Orderrule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::factory()
            ->has(
                Orderrule::factory()
                    ->count(3)
            )
            ->count(5)
            ->create();
    }
}
