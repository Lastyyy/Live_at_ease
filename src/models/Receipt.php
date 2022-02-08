<?php

class Receipt{
    private $amount;
    private $id_creator;
    private $text;
    private $creation_date;
    private $user_image;
    private $num_of_users;
    private $name;
    private $surname;

    public function __construct($amount, $id_creator, $text, $creation_date, $user_image, $num_of_users, $name, $surname)
    {
        $this->amount = $amount;
        $this->id_creator = $id_creator;
        $this->text = $text;
        $this->creation_date = $creation_date;
        $this->user_image = $user_image;
        $this->num_of_users = $num_of_users;
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getIdCreator()
    {
        return $this->id_creator;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getCreationDate()
    {
        return $this->creation_date;
    }

    public function getUserImage()
    {
        return $this->user_image;
    }

    public function getNumOfUsers()
    {
        return $this->num_of_users;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

}