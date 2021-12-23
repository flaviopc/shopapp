<?php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository
{
    protected $entity;

    public function __construct(Tag $tag)
    {
        $this->entity = $tag;
    }

    public function getAll()
    {
        return $this->entity->all();
    }

    public function findById(int $id)
    {
        return $this->entity->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->entity->create($data);
    }

    public function update(int $id, array $data)
    {
        $this->entity = $this->findById($id);
        return $this->entity->update($data);
    }

    public function delete(int $id)
    {
        $tag = $this->findById($id);
        return $tag->delete();
    }
}
