<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Repositories\RuleRepository;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public RuleRepository $article_repo;

    public function __construct(RuleRepository $repository)
    {
        $this->article_repo = $repository;
    }

    public function index()
    {
        return view('articles.index', [
            'articles' => $this->article_repo->get(),
        ]);
    }
}
