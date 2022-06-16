<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Repositories\RuleRepository;
use Illuminate\Http\Request;

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
        return view('rules.create', [
            'rule'  =>  new Rule,
            'types' => Rule::$types,
        ]);
    }

    public function store(Request $request)
    {
        dd($request->collect());
    }

    public function edit()
    {
        //
    }
}
