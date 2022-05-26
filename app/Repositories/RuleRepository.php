<?php

namespace App\Repositories;

use App\Interfaces\Repository\UserInterface;
use App\Models\Rule;
use Illuminate\Support\Collection;

class RuleRepository extends Repository implements UserInterface
{
    public function __construct(Rule $model)
    {
        $this->model = $model;
    }

    public function get(): Collection
    {
        return Rule::all();
    }
}
