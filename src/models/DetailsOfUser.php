<?php

class DetailsOfUser{
    private $id;
    private $name;
    private $surname;
    private $birthday;
    private $image;
    private $type;
    private $description;

    public function __construct($id, $name, $surname, $birthday, $image, $type, $description=null) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->birthday = $birthday;
        $this->image = $image;
        $this->type = $type;
        $this->description = $description;
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

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

}