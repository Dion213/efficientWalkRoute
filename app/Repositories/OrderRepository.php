<?php

namespace App\Repositories;

use App\Interfaces\Repository\OrderInterface;
use App\Models\Order;
use App\Models\Orderrule;
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
                'shoppingList', 'orderrules'
            ]);
    }

    public function store($parameters): Order
    {
        return Order::create($parameters);
    }

    public function update(Order $order, array $parameters): Order
    {
        $order->update($parameters);
        return $order;
    }

    public function addArticleToOrder(array $parameters): Orderrule
    {
        return Orderrule::create($parameters);
    }

    public function updateAmount(Orderrule $orderRule, int $amount): Orderrule
    {
        $orderRule->amount = $amount;
        $orderRule->save();
        return $orderRule;
    }

    public function removeArticleFromOrder(Orderrule $orderRule): bool
    {
       return $orderRule->delete();
    }

    public function destroy(Order $order): bool
    {
        return $order->delete();
    }
}
