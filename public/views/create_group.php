<?php require_once 'session_user.php';?>
<?php if(!isset($_SESSION['id_group'])!=1){
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/dashboard");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "public/css/create_group.css">
    <title>Create your group!</title>
</head>
<body>
    <div class="logo">
        <img src="public/img/logo.svg" width="80%" height="80%">
    </div>
    <form action="createGroup" method="POST">
        <textarea name="group_name" rows="4" maxlength="99"
                  placeholder="Podaj nazwę grupy!" required></textarea>
        <button class="button_login" type="submit">Stwórz grupę!</button>
    </form>
</body>
</html>