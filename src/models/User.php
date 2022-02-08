<?php

class User {
    private $id;
    private $email;
    private $password;
    private $id_group;
    private $id_user_details;

    public function __construct(
        int $id,
        string $email,
        string $password,
        int $id_group,
        int $id_user_details
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->id_group = $id_group;
        $this->id_user_details = $id_user_details;
    }

    public function getEmail(): string
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

    public function getIdGroup(): int
    {
        return $this->id_group;
    }

    public function getIdUserDetails(): int
    {
        return $this->id_user_details;
    }
}