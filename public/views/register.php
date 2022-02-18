<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "public/css/register.css">
    <script type="text/javascript" src="./public/js/register.js" defer></script>
    <title>Register - Live at Ease</title>
</head>
<body>
    <div class="register-container">
        <div class="logo">
            <img src="public/img/logo.svg" width="80%" height="80%">
        </div>
        <div class="register-form">
            <form action="register" method="POST">
                <?php if(isset($messages)):
                    foreach($messages as $message): ?>
                        <p><?= $message;?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
                <input name="email" type="text" placeholder="email@email.com*" required>
                <input name="password" type="password" placeholder="hasło*" required>
                <input name="confirmedPassword" type="password" placeholder="powtórz hasło*" required>
                <input name="name" type="text" placeholder="Imię*" required>
                <input name="surname" type="text" placeholder="Nazwisko*" required>
                <input name="birthday" type="date" min="1900-01-01" max="<?=date("Y-m-d", strtotime('-13 year'))?>">
                <select name="type" class="sel">
                    <option value="False">Jestem lokatorem</option>
                    <option value="True">Jestem właścicielem</option>
                </select>
                <button class="button_register" type="submit">Zarejestruj się</button>
                <a href="login"> <button type="button" class="button_login">Logowanie</button> </a>
            </form>
        </div>
    </div>
</body>
</html>