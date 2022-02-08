<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Information.php';
require_once __DIR__ . '/../repository/InformationRepository.php';
require_once __DIR__ .'/ReceiptController.php';

session_regenerate_id();
session_start();

class InformationController extends AppController {

    private $message = [];
    private $informationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->informationRepository = new InformationRepository();
    }

    public function dashboard()
    {
        $informations = $this->informationRepository->getInformations();

        $_SESSION["informations"] = $informations;

        $controller = "ReceiptController";
        $object = new $controller;
        $object->dashboard();

        $this->render('dashboard', ['informations' => $informations]);
    }

    public function addInformation()
    {
        if($this->isPost())
        {
            $information = new Information(
                $_SESSION["id_group"],
                $_SESSION["id_user"],
                $_POST['info_text'],
                date('Y-m-d H:i:s'),
                null, null
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