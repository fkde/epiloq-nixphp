<?php

namespace App\Models;

use NixPHP\ORM\Model\AbstractModel;

class Symptom extends AbstractModel
{

    protected string $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function getEpisode(): int
    {
        // Return episode
    }

}