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
        $product = $this->findById($id);
        $product->name = $data['name'];
        return $this->repository->update($product);
    }

    public function delete(int $id)
    {
        $product = $this->findById($id);
        return $product->delete();
    }
}
