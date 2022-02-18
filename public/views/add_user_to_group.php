<?php require_once 'session_user.php';?>
<?php require_once 'session_group.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "public/css/ui.css">
    <link rel = "stylesheet" type = "text/css" href = "public/css/add_user_to_group.css">
    <script src="https://kit.fontawesome.com/c65726fa38.js" crossorigin="anonymous"></script>
    <title>Add the information!</title>
</head>
<body>

<div class="page-container">

    <nav>
        <a href="dashboard">
            <button class="logo-button"><img alt="logo" src="public/img/logo.svg"></button>
        </a>
        <a href="dashboard">
            <button class="white-button">
                <i class="fas fa-home fa-4x"></i>
            </button>
        </a>
        <a href="info">
            <button class="orange-button">
                <i class="fas fa-info-circle fa-4x"></i>
            </button>
        </a>
        <a href="receipts_group">
            <button class="white-button">
                <i class="fas fa-money-bill fa-4x"></i>
            </button>
        </a>
        <a href="event">
            <button class="white-button">
                <i class="fas fa-calendar-day fa-4x"></i>
            </button>
        </a>
        <a href="profile">
            <button class="white-button">
                <i class="fas fa-address-card fa-4x"></i>
            </button>
        </a>
        <form action="logout" method="POST">
            <button id="logout-button" type="submit">
                <i class="fas fa-sign-out-alt fa-4x"></i>
            </button>
        </form>

    </nav>

    <?php require_once 'left_menu.php'?>

    <div class="middle">
        <form class="add-info" action="addUserToGroup" method="POST">
            <br><br>
            <p>DODAJ NOWEGO UŻYTKOWNIKA DO GRUPY</p>
            <br><br><br><br>
            <?php if(isset($messages)):
                foreach($messages as $message): ?>
                    <p><?= $message;?></p>
                <?php endforeach; ?>
            <?php endif; ?>
            <textarea name="code" rows="1" maxlength="6" minlength="6"
                      placeholder="Wpisz kod użytkownika, którego chcesz dodać" required></textarea>
            <button type="submit">Dodaj użytkownika</button>
        </form>
    </div>


    <?php require_once 'group.php';?>

</div>

</body>
</html>