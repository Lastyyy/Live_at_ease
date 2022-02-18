<?php

class User {
    private $id;
    private $email;
    private $password;
    private $id_group;
    private $id_user_details;
    private $type;
    private $code;

    public function __construct(
        $id,
        $email,
        $password,
        $id_group,
        $id_user_details,
        $type
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->id_group = $id_group;
        $this->id_user_details = $id_user_details;
        $this->type = $type;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdGroup()
    {
        return $this->id_group;
    }

    public function getIdUserDetails()
    {
        return $this->id_user_details;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }
}