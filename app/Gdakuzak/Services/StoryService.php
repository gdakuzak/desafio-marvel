<?php

namespace App\Gdakuzak\Services;

use App\Gdakuzak\Contracts\ServiceContract;
use App\Gdakuzak\Repositories\StoryRepository;

class StoryService implements ServiceContract
{
     /**
     * @var StoryRepository
     */
    private $repository;

     /**
     * @var StoryRepository
     */
     private $storyRepository;

    /**
     * Story Service constructor.
     * @param StoryRepository $storyRepository
     */
    public function __construct(StoryRepository $storyRepository)
    {
        $this->repository = $storyRepository;
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
