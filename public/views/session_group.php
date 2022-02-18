<?php
if(!isset($_SESSION['id_group'])){
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/choice");
}?>