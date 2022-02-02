<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    public function login(){
        $this -> render('login');
    }
    public function dashboard(){
        $animals = ['dog', 'cat', 'cow'];
        //TODO read data from database 

        //modify data

        //save data to db

        $this -> render('dashboard', ['animals' => $animals]);
    }
}