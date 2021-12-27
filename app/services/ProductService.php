<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected $repository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function getAllWithTag()
    {
        return $this->repository->getAllWithTag();
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
        if (isset($data['tags']))
            return $this->repository->createWithTags($data);

        return $this->repository->create($data);
    }

    public function update(int $id, array $data)
    {
        $product = $this->findById($id);
        if (isset($data['tags']))
            return $this->repository->updateWithTags($id, $data);
        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
