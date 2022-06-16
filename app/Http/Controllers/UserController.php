<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        return view('users.create', [
            'user' => new User,
        ]);
    }

    public function store(Request $request)
    {
        $this->user_repo->store($request->collect()->toArray());

        return redirect(route('users.index'));
    }
}
