<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Repositories\ArticleRepository;
use App\Repositories\DepartmentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
        $departments = [];
        foreach (App::make(DepartmentRepository::class)->get() as $department){
            $departments[$department->id] = $department->name;
        }

        return view('articles.create', [
            'article' => new Article,
            'departments' => $departments,
        ]);
    }

    public function store(Request $request)
    {
        $this->article_repo->store($request->collect()->toArray());

        return redirect(route('articles.index'));
    }

    public function edit(Article $article)
    {
        $departments = [];
        foreach (App::make(DepartmentRepository::class)->get() as $department){
            $departments[$department->id] = $department->name;
        }

        return view('articles.edit', [
            'article' => $article,
            'departments' => $departments,
        ]);
    }

    public function update(Article $article, Request $request)
    {

        $this->article_repo->update($article, $request->collect()->toArray());

        return redirect(route('articles.index'));
    }

    public function destroy(Article $article, Request $request)
    {
        if ($article->can_delete){
            $this->article_repo->destroy($article);
        }

        return redirect(route('articles.index'));
    }
}
