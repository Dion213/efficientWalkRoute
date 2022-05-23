<?php

namespace App\Interfaces\Repository;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;

interface DepartmentInterface
{
    public function get(): Collection;
    public function getOrderedByOrder(): Collection;
    public function saveOrder(Collection $departments):RedirectResponse|null;
}
