<?php

class Information{
    private $id_group;
    private $id_user;
    private $text;
    private $creation_date;
    private $user_image;
    private $name;

    public function __construct($id_group, $id_user, $text, $creation_date, $user_image, $name)
    {
        $this->id_group = $id_group;
        $this->id_user = $id_user;
        $this->text = $text;
        $this->creation_date = $creation_date;
        $this->user_image = $user_image;
        $this->name = $name;
    }

    public function getIdGroup()
    {
        return $this->id_group;
    }

    public function getIdUser()
    {
        return $this->id_user;
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

    public function getName()
    {
        return $this->name;
    }

}