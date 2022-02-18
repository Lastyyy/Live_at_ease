<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Event.php';
require_once __DIR__ . '/../repository/EventRepository.php';
require_once __DIR__ .'/EventController.php';
require_once __DIR__ . '/../repository/UsersGroupRepository.php';


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
        $_SESSION['events'] = $events;

        $this->render('dashboard', ['events' => $events]);
    }

    public function addEvent()
    {
        $usersGroupRepository = new UsersGroupRepository();
        $usersGroup = $usersGroupRepository->getUsersGroup();
        $_SESSION['usersGroup'] = $usersGroup;

        if($this->isPost())
        {
            $event = new Event(
                $_SESSION["id_group"],
                $_SESSION["id_user"],
                $_POST['date']." ".$_POST['time'],
                $_POST['info_text'],
                date('Y-m-d H:i:s'),
                null, null, null
            );
            $this->eventRepository->addEvent($event);
            //TODO ZMIENIC DASHBOARD NA EVENTS
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/event");

        }
        return $this->render('add_event');
    }

    public function event()
    {
        $usersGroupRepository = new UsersGroupRepository();
        $usersGroup = $usersGroupRepository->getUsersGroup();
        $_SESSION['usersGroup'] = $usersGroup;

        $events = $this->eventRepository->getEvents();
        $_SESSION["events"] = $events;

        $this->render('event');
    }
}