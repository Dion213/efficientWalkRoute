<?php

namespace App\Repositories;

use App\Interfaces\Repository\ShoppingListInterface;
use App\Models\ShoppingList;
use Illuminate\Support\Collection;

class ShoppingListRepository extends Repository implements ShoppingListInterface
{
    public function __construct(ShoppingList $model)
    {
        $this->model = $model;
    }

    public function get(): Collection
    {
        return ShoppingList::all();
    }
}
