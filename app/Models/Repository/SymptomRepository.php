<?php

namespace App\Models\Repository;

use App\Models\Symptom;
use NixPHP\ORM\Repository\AbstractRepository;

class SymptomRepository extends AbstractRepository
{

    protected function getEntityClass(): string
    {
        return Symptom::class;
    }

    public function findOrCreateByName(string $name): Symptom
    {
        return $this->findOrCreateBy('name', $name);
    }

    public function findOrCreateManyByName(array $names): array
    {
        return $this->findOrCreateManyBy('name', $names);
    }

}