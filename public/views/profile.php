<?php require_once 'session_user.php';?>
<?php require_once 'session_group.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "public/css/ui.css">
    <link rel = "stylesheet" type = "text/css" href = "public/css/profile.css">
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
            <button class="orange-button">
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
    <?php $this_user = $_SESSION['usersGroup'][strval($id)];?>
    <div class="middle">
        <div class="profile-box">
            <div class="left">
                <img class="profile-pic" alt="logo" src="public/uploads/<?= $this_user->getImage();?>">
                <?php if($id==0):?>
                <form action="addProfilePic" method="POST" ENCTYPE="multipart/form-data">
                    <input type="file" name="file"/><br/>
                    <button type="submit" class="left-menu-button">zmień zdjęcie</button>
                </form>
                <?php endif;?>
            </div>
            <div class="right">
                <?php if(isset($messages)):
                    foreach($messages as $message): ?>
                        <p class="message"><?= $message;?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
                <p class="name_surname"><?=$this_user->getName()." ".$this_user->getSurname()?></p>
                <?php if($this_user->getBirthday()):?>
                    <p class="birtday">Data urodzenia: <?=$this_user->getBirthday()?></p>
                <?php endif;?>
                <?php if($this_user->getDescription()):?>
                    <p class="description"><?=$this_user->getDescription()?></p>
                <?php endif;?>
                <?php if($id==0):?>
                    <form action="changeDescription" method="POST" ENCTYPE="multipart/form-data">
                        <textarea name="info_text" rows="7" maxlength="499"
                                  placeholder="Wpisz swoj opis!" required></textarea>
                        <button type="submit" class="left-menu-button">send</button>
                    </form>
                <?php endif;?>
            </div>
        </div>
    </div>


    <?php require_once 'group.php';?>

</div>

</body>
</html>