<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected $entity;

    public function __construct(Product $product)
    {
        $this->entity = $product;
    }

    public function getAll()
    {
        return $this->entity->all();
    }

    public function getAllWithTag()
    {
        return $this->entity::with('tags')->get();
    }

    public function findById(int $id)
    {
        return $this->entity->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->entity->create($data);
    }

    public function createWithTags(array $data)
    {
        return $this->entity->create($data)->tags()->sync($data['tags']);
    }

    public function update(int $id, array $data)
    {
        $this->entity = $this->findById($id);
        return $this->entity->update($data);
    }

    public function updateWithTags(int $id, array $data)
    {
        $this->entity = $this->findById($id);
        $this->entity->update($data);
        return $this->entity->tags()->sync($data['tags']);
    }

    public function delete(int $id)
    {
        $product = $this->findById($id);
        return $product->delete();
    }
}
