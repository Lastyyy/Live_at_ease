<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/GroupRepository.php';
require_once __DIR__ . '/../repository/UsersGroupRepository.php';


session_start();
class DefaultController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    private $message=[];

    public function index()
    {
        $this->render('login');
    }

    public function choice()
    {
        $this->render('choice');
    }

    public function createGroup()
    {
        if(!$this->isPost()) return $this->render('create_group');
        $groupRepository = new GroupRepository();
        $groupRepository->createGroup(strval($_POST['group_name']));

        $usersGroupRepository = new UsersGroupRepository();
        $usersGroup = $usersGroupRepository->getUsersGroup();
        $_SESSION['usersGroup'] = $usersGroup;

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dashboard");
    }

    public function addProfilePic()
    {
        if (is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file']))
        {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $usersGroupRepository = new UsersGroupRepository();
            $usersGroupRepository->updatePic(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

            return $this->render('profile', ['messages' => $this->message]);
        }
        return $this->render('profile', ['messages' => $this->message]);
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }

    public function changeDescription()
    {

    }

}