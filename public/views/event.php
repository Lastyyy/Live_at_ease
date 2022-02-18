<?php require_once 'session_user.php';?>
<?php require_once 'session_group.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "public/css/ui.css">
    <link rel = "stylesheet" type = "text/css" href = "public/css/events.css">
    <script src="https://kit.fontawesome.com/c65726fa38.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>
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
                <button class="white-button">
                    <i class="fas fa-info-circle fa-4x"></i>
                </button>
            </a>
            <a href="receipts_group">
                <button class="white-button">
                    <i class="fas fa-money-bill fa-4x"></i>
                </button>
            </a>
            <a href="event">
                <button class="orange-button">
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

        <?php require_once 'left_menu.php';?>



        <div class="middle">

            <div class="info-container">
                <div class="top-title">
                    <i class="far fa-calendar-alt fa-2x"></i>
                    &nbsp;najnowsze wydarzenia&nbsp;
                    <i class="far fa-calendar-alt fa-2x"></i>
                </div>
                <div class="info-box">
                    <?php if(empty($events = $_SESSION["events"])):?>
                    <p>Brak wydarzeń!</p>
                    <?php else:
                    foreach($events as $event):?>
                        <div class="<?= $event->getDate()>date('Y-m-d H:i:s') ? "event" : "past-event"?>">
                            <div>
                                <img class="avatar" alt="logo" src="public/uploads/<?= $event->getUserImage();?>">
                                <div>
                                    <p class="who"><?= $event->getName()." ".$event->getSurname();?></p>
                                    <p class="date"><?= $event->getDate();?></p>
                                </div>
                            </div>
                            <p class="max-lines"><?=$event->getText();?></p>
                        </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>



        </div>

        <?php require_once 'group.php';?>

    </div>

</body>
</html>