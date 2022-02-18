<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__ . '/../models/DetailsOfUser.php';

class RegisteringUserRepository extends Repository
{
    private function randomCode($length = 6) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';

        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, strlen($characters) - 1)];
        }

        return $string;
    }

    public function register(User $user, DetailsOfUser $userDetails): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO user_details (name, surname, birthday, image)
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            $userDetails->getName(),
            $userDetails->getSurname(),
            $userDetails->getBirthday(),
            "0.png"
        ]);

        $stmt = $this->database->connect()->prepare('
        SELECT user_details.id FROM user_details WHERE id=(SELECT max(id) FROM user_details)
        ');
        $stmt->execute();
        $id_details=intval($stmt->fetch(PDO::FETCH_ASSOC)['id']);


        $randomCode = "";
        $found = "";
        while($randomCode == $found) {
            $randomCode = $this->randomCode();
            $stmt = $this->database->connect()->prepare('
            SELECT users.code FROM users WHERE users.code=:randomCode
            ');
            $stmt->bindParam(':randomCode', $randomCode, PDO::PARAM_STR);
            $stmt->execute();
            $found = strval($stmt->fetch(PDO::FETCH_ASSOC)['code']);
        }

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (password, email, type, id_user_details, code)
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $user->getPassword(),
            $user->getEmail(),
            $user->getType(),
            $id_details,
            $randomCode
        ]);

    }



}