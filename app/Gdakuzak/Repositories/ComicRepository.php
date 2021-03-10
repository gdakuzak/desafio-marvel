<?php

namespace App\Gdakuzak\Repositories;

use App\Gdakuzak\Models\Comic;

class ComicRepository
{
    /**
     * @var Role
     */
    private $model;

    /**
     * Comic Repository constructor.
     * @param Comic $comic
     */
    public function __construct(Comic $comic)
    {
        $this->model = $comic;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->get();
    }
    
    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->model->create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        return $this->model->find($id)->fill($data)->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}
