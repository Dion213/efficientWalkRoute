<?php

namespace App\Repositories;

use App\Interfaces\Repository\OrderInterface;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Collection;

class OrderRepository extends Repository implements OrderInterface
{
    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function get(): Collection
    {
        return Order::all();
    }

    public function getForUser(User $user): Collection
    {
        return Order::query()
            ->where('user_id', $user->id)
            ->get()
            ->load([
                'shoppingList', 'articles'
            ]);
    }
}
