<?php require_once 'session_user.php';?>
<?php require_once 'session_group.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "public/css/ui.css">
    <link rel = "stylesheet" type = "text/css" href = "public/css/add_receipt.css">
    <script src="https://kit.fontawesome.com/c65726fa38.js" crossorigin="anonymous"></script>
    <title>Add the receipt!</title>
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
        <form class="add-rec" action="addReceipt" method="POST">
            <p>DODAWANIE NOWEGO RACHUNKU</p>
            <?php if(isset($messages)):
                foreach($messages as $message): ?>
                    <p class="message"><?= $message;?></p>
                <?php endforeach; ?>
            <?php endif; ?>
            <textarea name="info_text" rows="4" maxlength="99"
                      placeholder="Wpisz informację dotyczącą rachunku!" required></textarea>
            <div class="amount-box">
                <input name="amount" type="text" placeholder="Kwota" required/>
                <p>&nbsp;zł</p>
            </div>
            <p>Z kim chcesz podzielić rachunek?</p>
            <div class="people-box">
                <?php if(empty($usersGroup = $_SESSION["usersGroup"])):?>
                    <p class="message">Brak współlokatorów w grupie</p>
                <?php else:
                $counter=0;
                foreach($usersGroup as $userDetails):
                if($userDetails->getType()==False):
                $counter+=1;?>
                <div class="person">
                    <input type="checkbox" id="checkbox<?=$counter?>" name="checkbox[]">
                    <label for="checkbox<?=$counter?>">
                        <img class="avatar" alt="logo" src="public/uploads/<?= $userDetails->getImage();?>">
                        <p class="who">&nbsp;&nbsp; <?= $userDetails->getName()/*.$userDetails->getId();*/?></p>
                    </label>
                </div>
                <?php endif; endforeach;
                if($counter==0):?>
                    <p class="message">Brak współlokatorów w grupie</p>
                <?php endif; endif;?>
            </div>
            <button type="submit">Dodaj rachunek</button>
        </form>
    </div>


    <?php require_once 'group.php';?>

</div>

</body>
</html>