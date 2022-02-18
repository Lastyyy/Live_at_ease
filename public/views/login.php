<?php
session_start();
if(isset($_SESSION['id_user'])){
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/dashboard");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "public/css/login.css">
    <title>Live at Ease!</title>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="public/img/logo.svg" width="80%" height="80%">
        </div>
        <div class="login-form">
            <form action="login" method="POST">
                <?php if(isset($messages)):
                    foreach($messages as $message): ?>
                        <p><?= $message;?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
                <input name="email" type="text" placeholder="email" required>
                <input name="password" type="password" placeholder="hasło" required>
                <button class="button_login" type="submit">
                    <img src="public/img/login_button.svg" width="60%" height="60%">
                </button>
                <a href="register"> <button type="button" class="button_register">Rejestracja</button> </a>
            </form>
        </div>
    </div>
</body>
</html>