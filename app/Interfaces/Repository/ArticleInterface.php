<?php

namespace App\Interfaces\Repository;

use App\Models\Article;
use Illuminate\Support\Collection;

interface ArticleInterface
{
    public function get(): Collection;
    public function save(Article $article);
}
