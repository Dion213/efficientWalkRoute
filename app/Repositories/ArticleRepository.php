<?php

namespace App\Repositories;

use App\Interfaces\Repository\UserInterface;
use App\Models\Article;
use Illuminate\Support\Collection;

class ArticleRepository extends Repository implements UserInterface
{
    public function __construct(Article $model)
    {
        $this->model = $model;
    }

    public function get(): Collection
    {
        return Article::all();
    }
}
