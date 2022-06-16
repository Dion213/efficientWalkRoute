<?php

namespace App\Interfaces;

use App\Models\Article;
use App\Models\ShoppingList;

interface WalkRouteRule
{
    public function __construct(ShoppingList $shoppingList, Article $article, int $amount, array $settings);

    public function priority(): int;
    public function getAmount(): int;
    public function getReason(): ?string;
    public function hasBeenApplied(): bool;
    public function getOptions(): array;
}
