<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Receipt.php';
require_once __DIR__ .'/../models/DetailsOfUser.php';
require_once __DIR__ . '/../repository/UsersGroupRepository.php';
require_once __DIR__ . '/../repository/GroupRepository.php';
require_once __DIR__ .'/ReceiptController.php';

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

    public function addUserToGroup()
    {
        $usersGroupRepository = new UsersGroupRepository();
        $usersGroup = $usersGroupRepository->getUsersGroup();
        $_SESSION['usersGroup'] = $usersGroup;

        if(!$this->isPost()) return $this->render('add_user_to_group');
        $code = $_POST['code'];

        if(strlen($code)<6) return $this->render('add_user_to_group', ['messages' => ['Podany kod jest za krótki!']]);

        if(preg_match('/[\'^£$%&*()}{@#~?!><>,|=_+.¬-]/', $code))
            return $this->render('add_user_to_group', ['messages' => ['Podany kod zawiera niedozwolone znaki!']]);

        $groupRepository = new GroupRepository();
        $codeExists = $groupRepository->addUserToGroup($code);

        if(!$codeExists)
            return $this->render('add_user_to_group', ['messages' => ['Dany użytkownik już należy do jakiejś grupy!']]);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dashboard");
    }

    public function profile(int $id=0)
    {
        $usersGroupRepository = new UsersGroupRepository();
        $usersGroup = $usersGroupRepository->getUsersGroup(True);
        $_SESSION['usersGroup'] = $usersGroup;

        return $this->render('profile', ['id' => $id, '']);
    }
}