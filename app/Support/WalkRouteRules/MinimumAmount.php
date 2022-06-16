<?php

namespace App\Support\WalkRouteRules;

use App\Interfaces\WalkRouteRule;
use App\Models\Article;
use App\Models\ShoppingList;

class MinimumAmount extends BasicRule implements WalkRouteRule
{
    private function setOptions(): void
    {
        $this->options = [
            'min' => 'int',
        ];
    }

    private function apply(): void
    {
        if ($this->amount < $this->settings['min']) {
            $this->amount = $this->settings['min'];
            $this->applied = true;
        }
    }

    public function priority(): int
    {
        return 1;
    }

    public function getReason(): ?string
    {
        if ($this->applied) {
            return 'Raised to minimum amount';
        }

        return null;
    }
}
