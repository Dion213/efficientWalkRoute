<?php

namespace App\Http\Controllers;

use App\Repositories\RuleRepository;

class RulesController extends Controller
{
    protected $rules_repo;

    public function __construct(RuleRepository $repository)
    {
        $this->rules_repo = $repository;
    }

    public function index()
    {
        return view('rules.index', [
            'rules' => $this->rules_repo->get(),
        ]);
    }

    public function create()
    {
        //
    }

    public function edit()
    {
        //
    }
}
