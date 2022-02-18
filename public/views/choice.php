<?php require_once 'session_user.php';?>
<?php if(!isset($_SESSION['id_group']) != 1){
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/dashboard");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "public/css/choice.css">
    <title>You aren't in a group yet!</title>
</head>
<body>
    <div class="logo">
        <img src="public/img/logo.svg" width="80%" height="80%">
    </div>
    <div class="right">
        <p>Aby dołączyć do istniejącej grupy, podaj swój kod jednemu z jej członków!</p>
        <div>
            <p>Twój kod użytkownika:</p>
            <p class="code"><?=$_SESSION['code']?></p>
        </div>
        <br><br>
        <p>Możesz również utworzyć nową grupę!</p>
        <a href="createGroup"> <button type="button" class="create-button">Stwórz grupę!</button> </a>
        <br><br><br>
        <form action="logout" method="POST">
            <button id="logout-button" type="submit">Wyloguj</button>
        </form>
    </div>
</body>
</html>