<?php

namespace App\Interfaces\Repository;

use Illuminate\Support\Collection;

interface OrderInterface
{
    public function get(): Collection;
}
