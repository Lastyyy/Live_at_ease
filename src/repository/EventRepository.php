<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Event.php';

class EventRepository extends Repository
{
    public function getEvents(): array
    {
        $id_group = $_SESSION["id_group"];
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT events.*, user_details.image, user_details.name, user_details.surname FROM events 
            LEFT JOIN users on events.id_user=users.id join user_details on users.id_user_details=user_details.id 
            WHERE events.id_group = :id_group ORDER BY creation_date DESC
        ');
        $stmt->bindParam(':id_group', $id_group, PDO::PARAM_INT);
        $stmt->execute();

        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($events)) {
            return array();
        }

        foreach ($events as $event) {
            $result[] = new Event(
                $event['id_group'],
                $event['id_user'],
                $event['date'],
                $event['text'],
                $event['creation_date'],
                $event['image'],
                $event['name'],
                $event['surname']
            );
        }
        return $result;
    }

    public function addEvent(Event $event): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO events (id_group, id_user, date, creation_date, text)
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            $event->getIdGroup(),
            $event->getIdUser(),
            $event->getDate(),
            $event->getCreationDate(),
            $event->getText()
        ]);
    }

}