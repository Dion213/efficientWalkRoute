<?php

namespace App\Interfaces\Repository;

use Illuminate\Support\Collection;

interface UserInterface
{
    public function get(): Collection;
}
