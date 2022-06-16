<?php

namespace App\Support\WalkRouteRules;

use App\Interfaces\WalkRouteRule;
use App\Models\Article;
use App\Models\ShoppingList;

class BasicRule implements WalkRouteRule
{
    protected ShoppingList $shoppingList;
    protected Article $article;
    protected int $amount;
    protected array $settings;
    protected bool $applied;
    protected array $options;

    public function __construct(ShoppingList $shoppingList, Article $article, int $amount, array $settings)
    {
        $this->shoppingList = $shoppingList;
        $this->article = $article;
        $this->amount = $amount;
        $this->settings = $settings;
        $this->applied = false;

        $this->setOptions();
        $this->apply();
    }

    private function apply(): void
    {

    }

    public function priority(): int
    {
        return 1;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function hasBeenApplied(): bool
    {
        return $this->applied;
    }

    public function getReason(): ?string
    {
        return null;
    }

    private function setOptions(): void
    {
        $this->options = [];
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
