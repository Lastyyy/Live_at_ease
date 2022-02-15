<?php

class UserDetails {
    private $id;
    private $name;
    private $surname;
    private $age;
    private $birthday;
    private $image;

    public function __construct($id, $name, $surname, $age, $birthday, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->birthday = $birthday;
        $this->image = $image;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getImage()
    {
        return $this->image;
    }
}