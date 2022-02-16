<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "public/css/normal_ui.css">
    <link rel = "stylesheet" type = "text/css" href = "public/css/receipts_group.css">
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
            <button class="orange-button">
                <i class="fas fa-money-bill fa-4x"></i>
            </button>
        </a>
        <a href="receipts_group">
            <button class="white-button">
                <i class="fas fa-calendar-day fa-4x"></i>
            </button>
        </a>
        <a href="events">
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

        <div class="buttons-container">
            <a href="receipts_group">
                <button class="orange-button-sec">
                    <i class="fas fa-users fa-3x"></i>
                </button>
            </a>
            <a href="receipts_owner">
                <button class="white-button-sec">
                    <i class="fas fa-crown fa-3x"></i>
                </button>
            </a>
        </div>

        <div class="content-container">

            <div class="receipts-boxes-container">
                <div class="top-title">
                    <i class="fas fa-money-bill fa-2x"></i>
                    &nbsp;Oczekujące rachunki współlokatorskie&nbsp;
                    <i class="fas fa-money-bill fa-2x"></i>
                </div>

                <div class="receipts-box">
                    <?php if(empty($receipts = $_SESSION["receipts"])):?>
                        <p>Brak rachunków do zapłaty!</p>
                    <?php else:
                    $counter=0;
                    foreach($receipts as $receipt):
                    if($receipt->getPaid()==False):
                    $counter=1;?>
                    <div class="receipt">
                        <div class="left">
                            <div>
                                <img class="avatar" alt="logo" src="public/uploads/<?= $receipt->getUserImage();?>">
                                <div>
                                    <p class="who"><?= $receipt->getName();?></p>
                                    <p class="when"><?= $receipt->getCreationDate();?></p>
                                </div>
                            </div>
                            <p><?=$receipt->getText();?></p>
                        </div>
                        <div class="right">
                            <p class="amount"><?=$receipt->getAmount()."zł";?></p>
                            <div class="send-to">
                                <div>
                                    <p class="send">Prześlij</p>
                                    <p class="how-much"><?=number_format($receipt->getAmount()/floatval($receipt->getNumOfUsers()),2)."zł";?></p>
                                </div>
                                <img class="avatar" alt="logo" src="public/uploads/<?= $receipt->getUserImage();?>">
                            </div>
                        </div>
                    </div>
                    <?php endif; endforeach;
                    if($counter==0):?>
                        <p>Brak rachunków do zapłaty!</p>
                    <?php endif; endif;?>
                </div>
            </div>

            <div class="receipts-boxes-container">
                <div class="top-title">
                    <i class="fas fa-money-bill fa-2x"></i>
                    &nbsp;Opłacone rachunki współlokatorskie&nbsp;
                    <i class="fas fa-money-bill fa-2x"></i>
                </div>

                <div class="receipts-box">
                    <?php if(empty($receipts = $_SESSION["receipts"])):?>
                    <p>Brak zapłaconych rachunków</p>
                    <?php else:
                        $counter=0;
                        foreach($receipts as $receipt):
                        if($receipt->getPaid()==True):
                        $counter=1;?>
                        <div class="receipt" id="paid-one">
                            <div class="left">
                                <div>
                                    <img class="avatar" alt="logo" src="public/uploads/<?= $receipt->getUserImage();?>">
                                    <div>
                                        <p class="who"><?= $receipt->getName();?></p>
                                        <p class="when"><?= $receipt->getCreationDate();?></p>
                                    </div>
                                </div>
                                <p><?=$receipt->getText();?></p>
                            </div>
                            <div class="right">
                                <p class="amount"><?=$receipt->getAmount()."zł";?></p>
                                <div class="sent-to">
                                    <div>
                                        <p class="sent">Zapłacono</p>
                                        <p class="how-much-paid"><?=number_format($receipt->getAmount()/floatval($receipt->getNumOfUsers()),2)."zł";?></p>
                                    </div>
                                    <img class="avatar" alt="logo" src="public/uploads/<?= $receipt->getUserImage();?>">
                                </div>
                            </div>
                        </div>
                    <?php endif; endforeach;
                    if($counter==0):?>
                    <p>Brak zapłaconych rachunków</p>
                    <?php endif; endif;?>
                </div>
            </div>

        </div>

    </div>


    <?php require_once 'group.php';?>
</div>

</body>
</html>