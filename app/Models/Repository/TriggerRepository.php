<?php

namespace App\Models\Repository;

use App\Models\Trigger;
use NixPHP\ORM\Repository\AbstractRepository;

class TriggerRepository extends AbstractRepository
{

    protected function getEntityClass(): string
    {
        return Trigger::class;
    }

    public function findOrCreateByName(string $name): Trigger
    {
        return $this->findOrCreateBy('name', $name);
    }

    public function findOrCreateManyByName(array $names): array
    {
        return $this->findOrCreateManyBy('name', $names);
    }

}