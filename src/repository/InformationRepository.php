<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Information.php';

class InformationRepository extends Repository
{
    public function getInformations(): array
    {
        $id_group = $_SESSION["id_group"];
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT informations.*, user_details.image, user_details.name FROM informations LEFT JOIN users 
                on informations.id_user=users.id join user_details on users.id_user_details=user_details.id 
                    WHERE informations.id_group = :id_group ORDER BY creation_date DESC
        ');
        $stmt->bindParam(':id_group', $id_group, PDO::PARAM_INT);
        $stmt->execute();

        $informations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($informations)) {
            return array();
        }

        foreach ($informations as $information) {
            $result[] = new Information(
                $information['id_group'],
                $information['id_user'],
                $information['text'],
                $information['creation_date'],
                $information['image'],
                $information['name']
            );
        }
        return $result;
    }

    public function addInformation(Information $information): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO informations (id_group, id_user, creation_date, text)
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            $information->getIdGroup(),
            $information->getIdUser(),
            $information->getCreationDate(),
            $information->getText()
        ]);
    }

}