<?php
namespace projectPhp\Models;
use projectPhp\src\Views;

class ModelUsers
{
    private $first_name;
    private $last_name;
    private $email;
    private $phone;
    private $password;

    public function getFirst_name()
    {
        return $this->first_name;
    }

    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
    }

    public function getLast_name()
    {
        return $this->last_name;
    }

    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        return $this->phone = $phone;
    }

    public function getPassword()
    {
        return $this->password;

    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}


