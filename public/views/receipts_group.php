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

        <button class="logo-button"><img alt="logo" src="public/img/logo.svg"></button>
        <button class="white-button">
            <i class="fas fa-home fa-4x"></i>
        </button>
        <button class="white-button">
            <i class="fas fa-info-circle fa-4x"></i>
        </button>
        <button class="orange-button">
            <i class="fas fa-money-bill fa-4x"></i>
        </button>
        <button class="white-button">
            <i class="far fa-calendar-alt fa-4x"></i>
        </button>
        <button class="white-button">
            <i class="fas fa-address-card fa-4x"></i>
        </button>
        <button id="logout-button">
            <i class="fas fa-sign-out-alt fa-4x"></i>
        </button>
    </nav>


    <div class="left-menu">

        <ul>
            <li>
                <button class="left-menu-button">
                    dodaj nową informację
                    <i class="fas fa-info-circle fa-2x"></i>
                </button>
            </li>
            <li>
                <button class="left-menu-button">
                    dodaj nowy rachunek
                    <i class="fas fa-money-bill fa-2x"></i>
                </button>
            </li>
            <li>
                <button class="left-menu-button">
                    dodaj nowe wydarzenie
                    <i class="far fa-calendar-alt fa-2x"></i>
                </button>
            </li>
            <li>
                <button class="left-menu-button">
                    ustawienia
                    <i class="fas fa-cog fa-2x"></i>
                </button>
            </li>
        </ul>
    </div>


    <div class="middle">

        <div class="buttons-container">
            <button class="orange-button-sec">
                <i class="fas fa-users fa-3x"></i>
            </button>
            <button class="white-button-sec">
                <i class="fas fa-crown fa-3x"></i>
            </button>
        </div>

        <div class="content-container">

            <div class="receipts-boxes-container">
                <div class="top-title">
                    <i class="fas fa-money-bill fa-2x"></i>
                    &nbsp;Oczekujące rachunki współlokatorskie&nbsp;
                    <i class="fas fa-money-bill fa-2x"></i>
                </div>

                <div class="receipts-box" id="waiting-one">

                    <div class="receipt">
                        <div>
                            <img class="avatar" alt="logo" src="public/img/p1.jpg">
                            <div>
                                <p class="who">Imię Nazwisko</p>
                                <p class="when">when</p>
                            </div>
                        </div>
                        <p>Za wczorajszą pizzę, piwko i chipsiki</p>
                        <p class="amount">89,99zł</p>
                        <div class="send-to">
                            <div>
                                <p class="send">Prześlij</p>
                                <p class="how-much">22,25zł</p>
                            </div>
                            <img class="avatar" alt="logo" src="public/img/p1.jpg">
                        </div>
                    </div>

                    <div class="receipt">
                        <div>
                            <img class="avatar" alt="logo" src="public/img/p1.jpg">
                            <div>
                                <p class="who">Imię Nazwisko</p>
                                <p class="when">when</p>
                            </div>
                        </div>
                        <p>Za wczorajszą pizzę, piwko i chipsiki</p>
                        <p class="amount">89,99zł</p>
                        <div class="send-to">
                            <div>
                                <p class="send">Prześlij</p>
                                <p class="how-much">22,25zł</p>
                            </div>
                            <img class="avatar" alt="logo" src="public/img/p1.jpg">
                        </div>
                    </div>

                    <div class="receipt">
                        <div>
                            <img class="avatar" alt="logo" src="public/img/p1.jpg">
                            <div>
                                <p class="who">Imię Nazwisko</p>
                                <p class="when">when</p>
                            </div>
                        </div>
                        <p>Za wczorajszą pizzę, piwko i chipsiki</p>
                        <p class="amount">89,99zł</p>
                        <div class="send-to">
                            <div>
                                <p class="send">Prześlij</p>
                                <p class="how-much">22,25zł</p>
                            </div>
                            <img class="avatar" alt="logo" src="public/img/p1.jpg">
                        </div>
                    </div>

                    <div class="receipt">
                        <div>
                            <img class="avatar" alt="logo" src="public/img/p1.jpg">
                            <div>
                                <p class="who">Imię Nazwisko</p>
                                <p class="when">when</p>
                            </div>
                        </div>
                        <p>Za wczorajszą pizzę, piwko i chipsiki</p>
                        <p class="amount">89,99zł</p>
                        <div class="send-to">
                            <div>
                                <p class="send">Prześlij</p>
                                <p class="how-much">22,25zł</p>
                            </div>
                            <img class="avatar" alt="logo" src="public/img/p1.jpg">
                        </div>
                    </div>

                    <div class="receipt">
                        <div>
                            <img class="avatar" alt="logo" src="public/img/p1.jpg">
                            <div>
                                <p class="who">Imię Nazwisko</p>
                                <p class="when">when</p>
                            </div>
                        </div>
                        <p>Za wczorajszą pizzę, piwko i chipsiki</p>
                        <p class="amount">89,99zł</p>
                        <div class="send-to">
                            <div>
                                <p class="send">Prześlij</p>
                                <p class="how-much">22,25zł</p>
                            </div>
                            <img class="avatar" alt="logo" src="public/img/p1.jpg">
                        </div>
                    </div>
                </div>
            </div>

            <div class="receipts-boxes-container">
                <div class="top-title">
                    <i class="fas fa-money-bill fa-2x"></i>
                    &nbsp;Opłacone rachunki współlokatorskie&nbsp;
                    <i class="fas fa-money-bill fa-2x"></i>
                </div>

                <div class="receipts-box" id="paid-one">

                    <div class="paid-receipt">
                        <div>
                            <img class="avatar" alt="logo" src="public/img/p1.jpg">
                            <div>
                                <p class="who">Imię Nazwisko</p>
                                <p class="when">when</p>
                            </div>
                        </div>
                        <p>Za wczorajszą pizzę, piwko i chipsiki</p>
                        <p class="amount">89,99zł</p>
                        <div class="sent-to">
                            <div>
                                <p class="send">Zapłacono</p>
                                <p class="how-much">22,25zł</p>
                            </div>
                            <img class="avatar" alt="logo" src="public/img/p1.jpg">
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>


    <div class="group">

        <ul>
            <li>
                <img class="avatar" alt="logo" src="public/img/p1.jpg">
                Imię Nazssssssssswisko
            </li>
            <li>
                <img class="avatar" alt="logo" src="public/img/p1.jpg">
                Imię Nazwisko
            </li>
            <li>
                <img class="avatar" alt="logo" src="public/img/p1.jpg">
                Imię Nazwisko
            </li>
        </ul>
    </div>
</div>

</body>
</html>