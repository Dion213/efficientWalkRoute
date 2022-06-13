<?php

namespace App\Repositories;

use App\Interfaces\Repository\ShoppingListInterface;
use App\Models\ShoppingList;
use Illuminate\Support\Collection;

class ShoppingListRepository extends Repository implements ShoppingListInterface
{
    public ShoppingList $shoppingList;

    public function __construct(ShoppingList $model)
    {
        $this->shoppingList = $model;
    }

    public function get(): Collection
    {
        return ShoppingList::all()
            ->sortBy('date', 1, true)
            ->load('orders');
    }

    public function getAllArticles(): Collection
    {
        return $this->shoppingList->all_articles;
    }
}
