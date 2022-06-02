<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;

class ArticleController extends Controller
{
    protected ArticleRepository $article_repo;

    public function __construct(ArticleRepository $repository)
    {
        $this->article_repo = $repository;
    }

    public function index()
    {
        return view('articles.index', [
            'articles' => $this->article_repo->get(),
        ]);
    }

    public function create()
    {
//        return view('articles.create');
    }

    public function edit()
    {
        //
    }
}
