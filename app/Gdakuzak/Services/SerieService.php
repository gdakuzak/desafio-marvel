<?php

namespace App\Gdakuzak\Services;

use App\Gdakuzak\Contracts\ServiceContract;
use App\Gdakuzak\Repositories\SerieRepository;

class SerieService implements ServiceContract
{
     /**
     * @var SerieRepository
     */
    private $repository;

     /**
     * @var SerieRepository
     */
     private $serieRepository;

    /**
     * Serie Service constructor.
     * @param SerieRepository $serieRepository
     */
    public function __construct(SerieRepository $serieRepository)
    {
        $this->repository = $serieRepository;
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
