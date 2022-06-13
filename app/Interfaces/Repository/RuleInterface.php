<?php

namespace App\Interfaces\Repository;

use Illuminate\Support\Collection;

interface RuleInterface
{
    public function get(): Collection;
}
