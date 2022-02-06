<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function login()
    {
        $this->render('login');
    }

    public function dashboard()
    {
        $this->render('dashboard');
    }

    public function receipts_group()
    {
        $this->render('receipts_group');
    }

    public function receipts_owner()
    {
        $this->render('receipts_owner');
    }
}