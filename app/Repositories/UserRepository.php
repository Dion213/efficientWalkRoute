<?php

namespace App\Repositories;

use App\Interfaces\Repository\OrderInterface;
use App\Interfaces\Repository\OrderruleInterface;
use App\Interfaces\Repository\UserInterface;
use App\Models\User;
use Illuminate\Support\Collection;

class UserRepository extends Repository implements UserInterface
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function get(): Collection
    {
        return User::all();
    }
}
