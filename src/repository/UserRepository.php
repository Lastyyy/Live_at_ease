<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUserByEmail(string $email, bool $code_needed=False): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        $return_user = new User(
            $user['id'],
            $user['email'],
            $user['password'],
            $user['id_group'] ?: 0,
            $user['id_user_details'],
            $user['type']
        );

        if($code_needed) $return_user->setCode($user['code']);

        return $return_user;
    }

    public function getUserById(int $id): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        $return_user = new User(
            $user['id'],
            $user['email'],
            $user['password'],
            $user['id_group'] ?: 0,
            $user['id_user_details'],
            $user['type']
        );

        return $return_user;
    }
}