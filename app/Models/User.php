<?php

namespace App\Models;

use NixPHP\ORM\Model\AbstractModel;

class User extends AbstractModel
{

    protected string $gender;
    protected string $username;
    protected string $email;
    protected string $password;
    protected \DateTime $birthdate;

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getBirthdate(): \DateTime
    {
        if (!$this->birthdate instanceof \DateTime) {
            $this->birthdate = new \DateTime($this->birthdate);
        }
        return $this->birthdate;
    }

}