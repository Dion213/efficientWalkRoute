<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Department;
use App\Models\Order;
use App\Models\ShoppingList;
use App\Models\User;
use App\Models\WalkRoute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DepartmentSeeder::class,
            ArticleSeeder::class,
            OrderSeeder::class,
            RuleSeeder::class,
//            ShoppingListSeeder::class,
//            UserSeeder::class,
//            WalkRouteSeeder::class,
        ]);

//        User::factory()
//            ->has(
//                Order::factory()
//                    ->has(
//                        Article::factory()
//                            ->has(Department::factory())
//                    )
//                    ->has(
//                        ShoppingList::factory([
//                            'walkroute_id' => null,
//                        ])
//                    )
//                    ->count(rand(1, 5))
//            )
//        ->count(3)
//        ->create();
    }
}
