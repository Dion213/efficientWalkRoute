<?php

namespace Database\Seeders;

use App\Models\WalkRoute;
use Illuminate\Database\Seeder;

class WalkRouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WalkRoute::factory()
            ->count(3)
            ->create();
    }
}
