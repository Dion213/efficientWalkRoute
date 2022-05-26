<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Repositories\OrderRepository;

class DepartmentController extends Controller
{
    public $department_repo;

    public function __construct(OrderRepository $repo)
    {
        $this->department_repo = $repo;
    }

    public function index()
    {
        return view('departments.index', [
//            'departments' => $this->department_repo->orderByOrderAsc(),
        ]);
    }
}
