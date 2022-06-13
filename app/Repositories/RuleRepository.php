<?php

namespace App\Repositories;

use App\Interfaces\Repository\RuleInterface;
use App\Models\Rule;
use Illuminate\Support\Collection;

class RuleRepository extends Repository implements RuleInterface
{
    public function __construct(Rule $model)
    {
        $this->model = $model;
    }

    public function get(): Collection
    {
        return Rule::all();
    }

    public function getRulesForArticles(array $articles): Collection
    {
        return Rule::query()
            ->whereIn('article_id', array_keys($articles))
            ->get();
    }
}
