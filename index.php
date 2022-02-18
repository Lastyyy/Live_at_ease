<?php

require 'Routing.php';
date_default_timezone_set("Europe/Warsaw");

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);


Router::get('', 'DefaultController');
Router::post('login', 'SecurityController');
Router::get('dashboard', 'InformationController');
Router::get('receipts_group', 'ReceiptController');
Router::get('receipts_owner', 'ReceiptController');
Router::post('addInformation', 'InformationController');
Router::get('info', 'InformationController');
Router::get('event', 'EventController');
Router::post('addReceipt', 'ReceiptController');
Router::post('addEvent', 'EventController');
Router::post('register', 'SecurityController');
Router::post('logout', 'SecurityController');
Router::post('choice', 'DefaultController');
Router::post('createGroup', 'DefaultController');
Router::post('addUserToGroup', 'UsersGroupController');
Router::post('profile', 'UsersGroupController');
Router::post('addProfilePic', 'DefaultController');
Router::post('changeDescription', 'DefaultController');


Router::run($path);
