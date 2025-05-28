<?php

namespace App\Models\Repository;

use App\Models\User;
use NixPHP\ORM\Repository\AbstractRepository;

class UserRepository extends AbstractRepository
{

    protected function getEntityClass(): string
    {
        return User::class;
    }

}