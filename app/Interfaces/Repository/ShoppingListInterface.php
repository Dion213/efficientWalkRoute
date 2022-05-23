<?php

namespace App\Interfaces\Repository;

use Illuminate\Support\Collection;

interface ShoppingListInterface
{
    public function get(): Collection;
}
