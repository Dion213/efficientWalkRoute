<?php

namespace App\Repositories;

use App\Interfaces\Repository\ArticleInterface;
use App\Models\Article;
use Illuminate\Support\Collection;

class ArticleRepository extends Repository implements ArticleInterface
{
    public function __construct(Article $model)
    {
        $this->model = $model;
    }

    public function get(): Collection
    {
        return Article::all();
    }

    public function getRules(Article $article): Collection
    {
        return $article->rules;
    }

    public function findOrFail($id): Article
    {
        return Article::findOrFail($id);
    }
}
