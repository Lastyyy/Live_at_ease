<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/RegisteringUserRepository.php';
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

        $user = $userRepository->getUser($email, True);

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
        if($user->getIdGroup()!=null) {
            $_SESSION["id_group"] = $user->getIdGroup();
        }
        $_SESSION["acc_type"] = $user->getType();
        $_SESSION["code"] = $user->getCode();

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
            return $this->render('login', ['messages'=>['Pomyślnie wylogowano!']]);
        }
    }

    public function register()
    {
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];

        $user = $userRepository->getUser($email);

        if ($user) {
            return $this->render('register', ['messages' => ['Konto o podanym email już istnieje!']]);
        }
        if(!preg_match('/\S+@\S+\.\S+/', $email)){
            return $this->render('register', ['messages' => ['Nieprawidłowy format email!']]);
        }

        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];

        if(!preg_match('/[\'^£$%&*()}{@#~?!><>,|=_+¬-]/', $password) || strlen($password)<8){
            return $this->render('register', ['messages' => ['Hasło musi mieć min. 8 znaków i znak specjalny!']]);
        }
        if ($password !== $confirmedPassword){
            return $this->render('register', ['messages' => ['Hasła nie zgadzają się!']]);
        }

        $registeringUserRepository = new RegisteringUserRepository();

        $user = new User(
            null,
            $email,
            $password,
            null,
            null,
            $_POST['type']
        );

        $userDetails = new DetailsOfUser(
            null,
            $_POST['name'],
            $_POST['surname'],
            $_POST['birthday'] ?: null,
            "0.png",
            $_POST['type']
        );

        $registeringUserRepository->register($user, $userDetails);
        return $this->render('login', ['messages' => ['Pomyślnie utworzono konto!']]);
    }
}