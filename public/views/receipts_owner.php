<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "public/css/normal_ui.css">
    <link rel = "stylesheet" type = "text/css" href = "public/css/receipts_owner.css">
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
                <button class="white-button-sec">
                    <i class="fas fa-users fa-3x"></i>
                </button>
            </a>
            <a href="receipts_owner">
                <button class="orange-button-sec">
                    <i class="fas fa-crown fa-3x"></i>
                </button>
            </a>
        </div>


        <div class="content-container">

            <div class="receipts-boxes-container">
                <div class="top-title">
                    <i class="fas fa-money-bill fa-2x"></i>
                    &nbsp;Opłaty za czynsz&nbsp;
                    <i class="fas fa-money-bill fa-2x"></i>
                </div>

                <div class="receipts-box" id="rents">

                    <div class="unpaid-rent">
                        <p class="month">Luty 2022</p>
                        <div>
                            <p>Aktualny stan:</p>
                            <p class="state">Opłacono 550zł / 950zł</p>
                        </div>
                        <i class="far fa-credit-card fa-2x"></i>
                    </div>

                    <div class="paid-rent">
                        <p class="month">Styczeń 2022</p>
                        <div>
                            <p>Aktualny stan:</p>
                            <p class="state">Opłacono!</p>
                        </div>
                    </div>

                </div>

            </div>

            <div class="receipts-boxes-container">
                <div class="top-title">
                    <i class="fas fa-money-bill fa-2x"></i>
                    &nbsp;Stan kaucji zwrotnej: 890zł / 950zł&nbsp;
                    <i class="fas fa-money-bill fa-2x"></i>
                </div>

                <div class="receipts-box" id="deposit">

                    <div class="depo-taken">
                        <div class="owner-for">
                            <div class="owner">
                                <img class="avatar" alt="logo" src="public/img/p1.jpg">
                                <div>
                                    <p class="who">Imię Nazwisko</p>
                                    <p class="when">when</p>
                                </div>
                            </div>
                            <p>Naprawa biurka</p>
                        </div>
                        <div class="depo-pay">
                            <p class="text">Potrącono z kaucji</p>
                            <p class="how-much">60zł</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <?php require_once 'group.php';?>
</div>

</body>
</html>