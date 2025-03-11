<?php

namespace App\Repositories;

 use Illuminate\Contracts\Container\BindingResolutionException;

 abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

     /**
      * @throws BindingResolutionException
      */
     public function __construct()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    abstract public function getModel();
    public function all()
    {
        return $this->model->all();
    }

    public function find(int $id)
    {
        return $this->model->findorFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, int $id)
    {
        $object = $this->model->find($id);

        return $object->update($data);
    }

    public function delete($id)
    {
        $object = $this->model->find($id);

        return $object->delete();
    }
}
