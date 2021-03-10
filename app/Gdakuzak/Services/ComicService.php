<?php

namespace App\Gdakuzak\Services;

use App\Gdakuzak\Contracts\ServiceContract;
use App\Gdakuzak\Repositories\ComicRepository;

class ComicService implements ServiceContract
{
     /**
     * @var ComicRepository
     */
    private $repository;

     /**
     * @var ComicRepository
     */
     private $comicRepository;

    /**
     * Comic Service constructor.
     * @param ComicRepository $comicRepository
     */
    public function __construct(ComicRepository $comicRepository)
    {
        $this->repository = $comicRepository;
    }

    /**
     * @return mixed
     */
    public function renderList()
    {
        return $this->repository->getAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function renderEdit($id)
    {
        return $this->repository->getById($id);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function buildUpdate($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function buildInsert($data)
    {
        return $this->repository->create($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function buildDelete($id)
    {
        return $this->repository->delete($id);
    }

}
