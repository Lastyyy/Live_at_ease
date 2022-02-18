<?php require_once 'session_user.php';?>
<?php require_once 'session_group.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "public/css/ui.css">
    <link rel = "stylesheet" type = "text/css" href = "public/css/dashboard.css">
    <script src="https://kit.fontawesome.com/c65726fa38.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/profile.js" defer></script>
    <title>Dashboard</title>
</head>
<body>

    <div class="page-container">

        <nav>
            <a href="dashboard">
                <button class="logo-button"><img alt="logo" src="public/img/logo.svg"></button>
            </a>
            <a href="dashboard">
                <button class="orange-button">
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

        <?php require_once 'left_menu.php';?>



        <div class="middle">

            <div class="info-container">
                <div class="top-title">
                    <i class="fas fa-info-circle fa-2x"></i>
                    &nbsp;najnowsze informacje&nbsp;
                    <i class="fas fa-info-circle fa-2x"></i>
                </div>
                <div class="info-box">
                    <?php if(empty($informations = $_SESSION["informations"])):?>
                    <p>Brak!</p>
                    <?php else:
                        $i=0;
                        foreach($informations as $information):?>
                    <div class="information">
                        <div>
                            <img class="avatar" alt="logo" src="public/uploads/<?= $information->getUserImage();?>">
                            <div>
                                <p class="who"><?= $information->getName();?></p>
                                <p class="when"><?= $information->getCreationDate();?></p>
                            </div>
                        </div>
                        <p class="max-lines"><?=$information->getText();?></p>
                    </div>
                    <?php $i=$i+1;
                    if($i==2) break;?>
                    <?php endforeach; endif; ?>
                </div>
            </div>




            <div class="info-container">
                <div class="top-title">
                    <i class="fas fa-money-bill fa-2x"></i>
                    &nbsp;nowe rachunki&nbsp;
                    <i class="fas fa-money-bill fa-2x"></i>
                </div>
                <div class="info-box">
                    <?php if(empty($receipts = $_SESSION["receipts"])):?>
                        <p>Brak!</p>
                    <?php else:
                        $i=0;
                        foreach($receipts as $receipt):?>
                    <div class="receipt">
                        <div>
                            <img class="avatar" alt="logo" src="public/uploads/<?= $receipt->getUserImage();?>">
                            <div>
                                <p class="who"><?= $receipt->getName();?></p>
                                <p class="when"><?= $receipt->getCreationDate();?></p>
                            </div>
                        </div>
                        <p class="max-lines"><?=$receipt->getText();?></p>
                        <p class="amount"><?=$receipt->getAmount()."zł";?></p>
                        <div class="send-to">
                            <div>
                                <p class="send">Prześlij</p>
                                <p class="how-much"><?=number_format($receipt->getAmount()/floatval($receipt->getNumOfUsers()),2)."zł";?></p>
                            </div>
                            <img class="avatar" alt="logo" src="public/uploads/<?= $receipt->getUserImage();?>">
                        </div>
                    </div>
                    <?php $i=$i+1;
                    if($i==2) break;?>
                    <?php endforeach; endif; ?>
                </div>
            </div>




            <div class="info-container">
                <div class="top-title">
                    <i class="far fa-calendar-alt fa-2x"></i>
                    &nbsp;najnowsze wydarzenia&nbsp;
                    <i class="far fa-calendar-alt fa-2x"></i>
                </div>
                <div class="info-box">
                    <?php if(empty($events = $_SESSION["events"])):?>
                    <p>Brak!</p>
                    <?php else:
                    $i=0;
                    foreach($events as $event):
                        if($event->getDate()>date('Y-m-d H:i:s')):?>
                            <div class="event">
                                <div>
                                    <img class="avatar" alt="logo" src="public/uploads/<?= $event->getUserImage();?>">
                                    <div>
                                        <p class="who"><?= $event->getName()." ".$event->getSurname();?></p>
                                        <p class="date"><?= $event->getDate();?></p>
                                    </div>
                                </div>
                                <p class="max-lines"><?=$event->getText();?></p>
                            </div>
                        <?php endif;
                        $i=$i+1;
                        if($i==2) break;?>
                    <?php endforeach; endif; ?>
                </div>
            </div>

            <div class="info-container">
                <div class="top-title">
                    <i class="fas fa-money-bill fa-2x"></i>
                    &nbsp;stan finansów&nbsp;
                    <i class="fas fa-money-bill fa-2x"></i>
                </div>
                <div class="info-box">
                    <div class="finance-info">
                        <i class="fas fa-home fa-2x"></i>
                        <div>
                            <p class="top-msg">Stan czynszu za obecny miesiąc:</p>
                            <p class="bot-msg">Zapłacono 500zł / 950zł</p>
                        </div>
                    </div>
                    <div class="finance-info">
                        <i class="fas fa-dollar-sign fa-2x"></i>
                        <div>
                            <p class="top-msg">Stan kaucji zwrotnej:</p>
                            <p class="bot-msg">Pozostało 890zł / 950zł</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php require_once 'group.php';?>

    </div>

</body>
</html>