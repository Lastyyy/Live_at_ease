<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Receipt.php';
require_once __DIR__ . '/../repository/UsersGroupRepository.php';
require_once __DIR__ .'/EventController.php';

session_regenerate_id();
session_start();

class UsersGroupController extends AppController {

    private $message = [];
    private $usersGroupRepository;

    public function __construct()
    {
        parent::__construct();
        $this->usersGroupRepository = new UsersGroupRepository();
    }

    public function dashboard()
    {
        $usersGroup = $this->usersGroupRepository->getusersGroup();
        $_SESSION["usersGroup"] = $usersGroup;

        $controller = "EventController";
        $object = new $controller;
        $object->dashboard();

        $this->render('dashboard', ['usersGroup' => $usersGroup]);

    }

}