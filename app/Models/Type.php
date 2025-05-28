<?php

namespace App\Models;

use NixPHP\ORM\Model\AbstractModel;

class Type extends AbstractModel
{
    protected string $name;

    public function getName(): string
    {
        return $this->name;
    }

}