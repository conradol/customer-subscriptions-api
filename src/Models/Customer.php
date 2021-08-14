<?php
namespace App\Models;

class Customer
{
    private $id;
    private $email;
    private $name;
    private $birthdate;
    private $gender;

    public function __construct($data)
    {
        foreach ($data as $k => $v) {
            $this->$k = $v;
        }
        
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setBirtdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }
}