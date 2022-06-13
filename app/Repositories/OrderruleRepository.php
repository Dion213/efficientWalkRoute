<?php

namespace App\Repositories;

use App\Interfaces\Repository\OrderruleInterface;
use App\Models\Orderrule;
use Illuminate\Support\Collection;

class OrderruleRepository extends Repository implements OrderruleInterface
{
    public function __construct(Orderrule $model)
    {
        $this->model = $model;
    }

    public function get(): Collection
    {
        return Orderrule::all();
    }
}
