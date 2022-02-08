<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once 'UsersGroupController.php';

class SecurityController extends AppController {

    public function login()
    {
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User with this email doesn\'t exist!']]);
        }

        /*if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email does not exist!']]);
        }*/

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        //ini_set('session.gc_maxlifetime', 900);
        //session_set_cookie_params(900);
        session_start();
        $_SESSION["id_user"] = $user->getId();
        $_SESSION["id_group"] = $user->getIdGroup();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dashboard");
    }

    public function logout()
    {
        if($this->isPost())
        {
            session_start();
            session_unset();
            session_destroy();
            return $this->render('login', ['messages'=>['Logged out successfully!']]);
        }
    }
}