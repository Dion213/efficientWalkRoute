<?php

namespace App\Repositories;

use App\Interfaces\Repository\WalkRouteInterface;
use App\Models\WalkRoute;
use Illuminate\Support\Collection;

class WalkrouteRepository extends Repository implements WalkRouteInterface
{
    public function __construct(WalkRoute $model)
    {
        $this->model = $model;
    }

    public function get(): Collection
    {
        return WalkRoute::all();
    }
}
