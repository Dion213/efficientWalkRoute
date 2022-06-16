<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Repositories\DepartmentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
        return view('departments.create', [
            'department' => new Department,
        ]);
    }

    public function store(Request $request)
    {
        $this->department_repo->store($request->collect()->toArray());

        return redirect(route('departments.index'));
    }

    public function edit(Department $department)
    {
        return view('departments.edit', [
            'department' => $department,
        ]);
    }

    public function update(Department $department, Request $request)
    {
        $this->department_repo->update($department, $request->collect()->toArray());

        return redirect(route('departments.index'));
    }

    public function destroy(Department $department)
    {
        if ($department->can_delete){
            $this->department_repo->destroy($department);
        }

        return redirect(route('departments.index'));
    }
}
