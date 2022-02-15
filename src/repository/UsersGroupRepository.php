<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/UserDetails.php';

session_start();

class UsersGroupRepository extends Repository
{
    public function getUsersGroup(): array
    {
        $id_group = $_SESSION["id_group"];
        $id_user = $_SESSION["id_user"];
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT public.users.*, public.user_details.name, public.user_details.surname,
            public.user_details.age, public.user_details.birthday, public.user_details.image
            FROM users inner join groups on users.id_group=groups.id inner join user_details 
            on users.id_user_details=user_details.id WHERE users.id_group = :id_group and 
            users.id != :id_user ORDER BY users.id ASC
        ');
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->bindParam(':id_group', $id_group, PDO::PARAM_INT);
        $stmt->execute();

        $userGroup = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($userGroup)) {
            return array();
        }

        foreach ($userGroup as $userDetails) {
            $result[] = new UserDetails(
                $userDetails['id'],
                $userDetails['name'],
                $userDetails['surname'],
                $userDetails['age'],
                $userDetails['birthday'],
                $userDetails['image'],
            );
        }
        return $result;
    }

}