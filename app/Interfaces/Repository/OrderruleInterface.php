<?php

namespace App\Interfaces\Repository;

use Illuminate\Support\Collection;

interface OrderruleInterface
{
    public function get(): Collection;
}
