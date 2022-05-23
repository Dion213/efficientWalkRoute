<?php

namespace App\Interfaces\Repository;

use Illuminate\Support\Collection;

interface WalkRouteInterface
{
    public function get(): Collection;
}
