<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user_repo;

    public function __construct(UserRepository $repository)
    {
        $this->user_repo = $repository;
    }

    public function index()
    {
        return view('users.index', [
            'users' => $this->user_repo->get(),
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
