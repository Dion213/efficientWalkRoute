<?php

namespace App\Repositories;

use App\Interfaces\Repository\DepartmentInterface;
use App\Models\Department;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;

class DepartmentRepository extends Repository implements DepartmentInterface
{
    public function __construct(Department $model)
    {
        $this->model = $model;
    }

    public function get(): Collection
    {
        return Department::all();
    }

    public function getOrderedByOrder(): Collection
    {
        return Department::query()->orderBy('order')->get();
    }

    public function saveOrder(Collection $departments): RedirectResponse|null
    {
        if ($departments->sortBy('order') === $this->getOrderedByOrder()){
            return null;
        }

        /** @var Department $department */
        foreach ($departments as $department){
            if ($department->isDirty()){
                $department->save();
            }
        }

        return redirect()->route('departments.index');
    }

    public function findOrFail($id): Department
    {
        return $this->model::findOrFail($id);
    }
}
