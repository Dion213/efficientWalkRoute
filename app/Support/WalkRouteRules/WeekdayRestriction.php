<?php

namespace App\Support\WalkRouteRules;

use App\Interfaces\WalkRouteRule;
use App\Models\Article;
use App\Models\ShoppingList;
use Carbon\Carbon;

class WeekdayRestriction extends BasicRule implements WalkRouteRule
{
    private function setOptions(): void
    {
        $this->options = [
            'available_on_days' => 'array',
        ];
    }

    private function apply(): void
    {
        if (!in_array($this->shoppingList->date->format('l'), $this->settings['available_on_days'])) {
            $this->amount = 0;
            $this->applied = true;
        }
    }

    public function priority(): int
    {
        return 10;
    }

    public function getReason(): ?string
    {
        if ($this->applied) {
            return 'Not available on this day';
        }

        return null;
    }
}
