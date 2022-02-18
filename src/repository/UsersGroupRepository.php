<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/DetailsOfUser.php';
session_start();
class UsersGroupRepository extends Repository
{
    public function getUsersGroup(bool $withUser=False): array
    {
        $id_group = $_SESSION["id_group"];
        $id_user = $_SESSION["id_user"];
        $zero = 0;
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT public.users.*, public.user_details.name, public.user_details.surname,
            public.user_details.birthday, public.user_details.image
            FROM users inner join groups on users.id_group=groups.id inner join user_details 
            on users.id_user_details=user_details.id WHERE users.id_group = :id_group and 
            users.id != :id_user ORDER BY users.id ASC
        ');
        $arg = $withUser ? $zero : $id_user;
        $stmt->bindParam(':id_user', $arg, PDO::PARAM_INT);
        $stmt->bindParam(':id_group', $id_group, PDO::PARAM_INT);
        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $this->database->connect()->prepare('
            SELECT groups.name FROM groups WHERE groups.id=:id_group
        ');
        $stmt->bindParam('id_group', $id_group, PDO::PARAM_INT);
        $stmt->execute();

        $name = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['group_name'] = $name['name'];

        if(empty($users)) {
            return array();
        }

        foreach($users as $details) {
            $result[] = new DetailsOfUser(
                $details['id'],
                $details['type'] ? "(W) ".$details['name'] : $details['name'],
                $details['surname'],
                $details['birthday'],
                $details['image'],
                $details['type']
            );
        }

        return $result;
    }

    public function updatePic(string $ext)
    {
        $id_user = $_SESSION["id_user"];

        $stmt = $this->database->connect()->prepare('
            SELECT user_details.id FROM users LEFT JOIN users_details WHERE users.id=:id_user
        ');
        $stmt->bindParam('id_user', $id_user, PDO::PARAM_INT);
        $stmt->execute();

        $det_id = $stmt->fetch(PDO::FETCH_ASSOC);
        $file_name = strval($det_id.$ext);

        $stmt = $this->database->connect()->prepare('
            UPDATE user_details SET image=:file_name FROM users INNER JOIN user_details WHERE users.id=:id_user
        ');
        $stmt->bindParam('id_user', $id_user, PDO::PARAM_INT);
        $stmt->bindParam('file_name', $file_name, PDO::PARAM_INT);
        $stmt->execute();
    }
}