<?php

namespace App\Repositories;

use App\Interfaces\Repository\WalkRouteInterface;
use App\Models\WalkRoute;
use Illuminate\Support\Collection;

class WalkrouteRepository extends Repository implements WalkRouteInterface
{
    protected $model;

    public function __construct(WalkRoute $model)
    {
        $this->model = $model;
    }

    public function get(): Collection
    {
        return WalkRoute::all();
    }

    public function create($parameters): WalkRoute
    {
        $walkroute = new WalkRoute;
        $walkroute->route = $parameters['route'];
        $walkroute->shopping_list_id = $parameters['shopping_list_id'];
        $walkroute->save();
        return $walkroute;
    }
}
