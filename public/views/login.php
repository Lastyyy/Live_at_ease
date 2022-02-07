<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "public/css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="public/img/logo.svg" width="80%" height="80%">
        </div>
        <div class="login-form">
            <form action="login" method="POST">
                <input name="email" type="text" placeholder="email">
                <input name="password" type="password" placeholder="password">
                <button class="button_login" type="submit">
                    <img src="public/img/login_button.svg" width="60%" height="60%">
                </button>
                <button class="button_register">Register</button>
            </form>
        </div>
    </div>
</body>
</html>