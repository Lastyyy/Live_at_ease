<?php

require_once 'Repository.php';

session_start();
class GroupRepository extends Repository
{
    public function createGroup(string $name)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO groups (name, id_owner)
            VALUES (?, ?)
        ');

        $stmt->execute([
            $name,
            $_SESSION['acc_type'] ? $_SESSION['id_user'] : null
        ]);

        $stmt = $this->database->connect()->prepare('
            SELECT groups.id FROM groups WHERE id=(SELECT max(id) FROM groups)
        ');
        $stmt->execute();
        $id_group=intval($stmt->fetch(PDO::FETCH_ASSOC)['id']);
        $_SESSION['id_group'] = $id_group;
        $_SESSION['group_name'] = $name;

        $stmt = $this->database->connect()->prepare('
            UPDATE users SET id_group = :id_group WHERE users.id=:id_user
        ');
        $stmt->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_INT);
        $stmt->bindParam(':id_group', $id_group, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function addUserToGroup(string $code)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT users.id, users.id_group FROM users WHERE code=:code
        ');
        $stmt->bindParam(':code', $code, PDO::PARAM_STR);
        $stmt->execute();
        if(!empty($users=$stmt->fetchAll(PDO::FETCH_ASSOC))){
            foreach($users as $user){
                $id_user = $user['id'];
                $id_group = $user['id_group'];
            }
            if(!isset($id_group)){
                $stmt = $this->database->connect()->prepare('
                    UPDATE users SET id_group=:id_group WHERE users.id=:id_user
                ');
                $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $stmt->bindParam(':id_group', $_SESSION['id_group'], PDO::PARAM_INT);
                $stmt->execute();
                return 1;
            }

        }
        return 0;

    }
}