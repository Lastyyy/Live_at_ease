<?php
session_start();
if(!isset($_SESSION['id_user'])){
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/login");
}?>