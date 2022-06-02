<?php

namespace App\Http\Controllers;

use App\Repositories\DepartmentRepository;

class DepartmentController extends Controller
{
    protected $department_repo;

    public function __construct(DepartmentRepository $repo)
    {
        $this->department_repo = $repo;
    }

    public function index()
    {
        return view('departments.index', [
            'departments' => $this->department_repo->getOrderedByOrder(),
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
