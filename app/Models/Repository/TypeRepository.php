<?php

namespace App\Models\Repository;

use App\Models\Type;
use NixPHP\ORM\Repository\AbstractRepository;

class TypeRepository extends AbstractRepository
{

    protected function getEntityClass(): string
    {
        return Type::class;
    }

    public function findOrCreateByName(string $name): Type
    {
        return $this->findOrCreateBy('name', $name);
    }

    public function findOrCreateManyByName(array $names): array
    {
        return $this->findOrCreateManyBy('name', $names);
    }

}