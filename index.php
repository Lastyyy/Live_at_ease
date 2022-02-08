<?php

require 'Routing.php';
date_default_timezone_set("Europe/Warsaw");

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::post('login', 'SecurityController');
Router::get('dashboard', 'InformationController');
Router::get('receipts_group', 'DefaultController');
Router::get('receipts_owner', 'DefaultController');
Router::post('addInformation', 'InformationController');
Router::post('addReceipt', 'ReceiptController');
Router::post('logout', 'SecurityController');


Router::run($path);