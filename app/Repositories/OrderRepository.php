<?php

namespace App\Repositories;

use App\Interfaces\Repository\OrderInterface;
use App\Models\Order;
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
}
