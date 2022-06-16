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
            ->sortBy('date', null, true)
            ->load('orders');
    }

    public function getAllArticles(): Collection
    {
        return $this->shoppingList->all_articles;
    }

    public function firstOrCreate($parameters): ShoppingList
    {
        $shoppingList = ShoppingList::firstOrCreate([
            'date' => $parameters['date'],
        ]);

        return $shoppingList;
    }

    public function update(ShoppingList $shoppingList, array $parameters): ShoppingList
    {
        $shoppingList->update($parameters);

        return $shoppingList;
    }

    public function findByDate(string $date): ?ShoppingList
    {
        return ShoppingList::whereDate($date)->first();
    }

    public function destroy(ShoppingList $shoppingList): bool
    {
        return $shoppingList->delete();
    }
}
