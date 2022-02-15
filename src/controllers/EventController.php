<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Event.php';
require_once __DIR__ . '/../repository/EventRepository.php';
require_once __DIR__ .'/EventController.php';

session_regenerate_id();
session_start();

class EventController extends AppController {

    private $message = [];
    private $eventRepository;

    public function __construct()
    {
        parent::__construct();
        $this->eventRepository = new EventRepository();
    }

    public function dashboard()
    {
        $events = $this->eventRepository->getEvents();

        $_SESSION["events"] = $events;

        /*$controller = "ReceiptController";
        $object = new $controller;
        $object->dashboard();*/

        $this->render('dashboard', ['events' => $events]);
    }

    public function addEvent()
    {
        if($this->isPost())
        {
            $event = new Event(
                $_SESSION["id_group"],
                $_SESSION["id_user"],
                $_POST['info_text'],
                date('Y-m-d H:i:s'),
                null, null, null, null
            );
            $this->informationRepository->addInformation($information);
            //TODO ZMIENIC DASHBOARD NA INFORMATIONS
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/dashboard");
            return $this->render('dashboard');

        }
        return $this->render('add_info');
    }

}