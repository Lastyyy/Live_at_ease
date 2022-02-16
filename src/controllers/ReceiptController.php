<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Receipt.php';
require_once __DIR__ . '/../repository/ReceiptRepository.php';
require_once 'UsersGroupController.php';

session_regenerate_id();
session_start();

class ReceiptController extends AppController {

    private $message = [];
    private $receiptRepository;

    public function __construct()
    {
        parent::__construct();
        $this->receiptRepository = new ReceiptRepository();
    }

    public function dashboard()
    {
        $receipts = $this->receiptRepository->getReceipts();
        $_SESSION["receipts"] = $receipts;

        $controller = "UsersGroupController";
        $object = new $controller;
        $object->dashboard();

        $this->render('dashboard', ['receipts' => $receipts]);
    }

    public function receipts_group()
    {
        $receipts = $this->receiptRepository->getReceipts();
        $_SESSION["receipts"] = $receipts;

        $this->render('receipts_group');
    }

    public function receipts_owner()
    {
        $receipts = $this->receiptRepository->getReceipts();
        $_SESSION["receipts"] = $receipts;

        $this->render('receipts_owner');
    }

    public function addReceipt()
    {
        if($this->isPost())
        {
            $receipt = new Receipt(
                round(floatval(str_replace(',', '.', $_POST["amount"])),2),
                $_SESSION["id_user"],
                $_POST['info_text'],
                date('Y-m-d H:i:s'),
                null,
                count($_POST['checkbox']),
                $_POST['checkbox'], null, null
            );
            $this->receiptRepository->addReceipt($receipt);
            //TODO ZMIENIC DASHBOARD NA INFORMATIONS
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/dashboard");
            return $this->render('dashboard');

        }
        return $this->render('add_receipt');
    }

}