<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Receipt.php';
require_once __DIR__ . '/../repository/ReceiptRepository.php';
require_once 'EventController.php';

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

        $controller = "EventController";
        $object = new $controller;
        $object->dashboard();

        $this->render('dashboard', ['receipts' => $receipts]);
    }

    public function receipts_group()
    {
        $usersGroupRepository = new UsersGroupRepository();
        $usersGroup = $usersGroupRepository->getUsersGroup();
        $_SESSION['usersGroup'] = $usersGroup;

        $receipts = $this->receiptRepository->getReceipts();
        $_SESSION["receipts"] = $receipts;

        $this->render('receipts_group');
    }

    public function receipts_owner()
    {
        $usersGroupRepository = new UsersGroupRepository();
        $usersGroup = $usersGroupRepository->getUsersGroup();
        $_SESSION['usersGroup'] = $usersGroup;

        $receipts = $this->receiptRepository->getReceipts();
        $_SESSION["receipts"] = $receipts;

        $this->render('receipts_owner');
    }

    public function addReceipt()
    {
        $usersGroupRepository = new UsersGroupRepository();
        $usersGroup = $usersGroupRepository->getUsersGroup();
        $_SESSION['usersGroup'] = $usersGroup;

        $this->isPost() ? $amount_str = str_replace(',', '.', $_POST['amount']) : $amount_str=null;
        //checking if amount is float and > 1zł
        if($this->isPost() and (floatval($amount_str) < 1.00 or strval(floatval($amount_str)) != $amount_str)) {
            return $this->render('add_receipt', ['messages' => ['Rachunek musi wynosić przynajmniej 1 zł']]);
        }

        if($this->isPost() and isset($_POST['checkbox']))
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

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/dashboard");

        }
        if(!isset($_POST['checkbox']) and $this->isPost()) return $this->render('add_receipt', ['messages' =>['Nie wybrano nikogo do podziału!']]);
        return $this->render('add_receipt');
    }

}