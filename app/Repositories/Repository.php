<?php

namespace App\Repositories;

abstract class Repository
{
    protected $model;

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    public function findWith($id, $with)
    {
        $query = $this->make($with);

        return $query->find($id);
    }

    public function make($with = [])
    {
        return $this->model->with($with);
    }
}
