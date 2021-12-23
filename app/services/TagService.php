<?php

namespace App\Services;

use App\Repositories\TagRepository;

class TagService
{
    protected $repository;
    public function __construct(TagRepository $tagRepository)
    {
        $this->repository = $tagRepository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function findById(int $id)
    {
        return $this->repository->findById($id);
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data)
    {
        $tag = $this->findById($id);
        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
