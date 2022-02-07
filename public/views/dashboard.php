<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "public/css/normal_ui.css">
    <link rel = "stylesheet" type = "text/css" href = "public/css/dashboard.css">
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
                        <i class="fas fa-calendar-plus fa-2x"></i>
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

            <div class="info-container">
                <div class="top-title">
                    <i class="fas fa-info-circle fa-2x"></i>
                    &nbsp;najnowsze informacje&nbsp;
                    <i class="fas fa-info-circle fa-2x"></i>
                </div>
                <div class="info-box">
                    <div class="information">
                        <div>
                            <img class="avatar" alt="logo" src="public/img/p1.jpg">
                            <div>
                                <p class="who">Imię Nazwisko</p>
                                <p class="when">when</p>
                            </div>
                        </div>
                        <p>Text of the informationText of the informationText of the information</p>
                    </div>
                    <div class="information">
                        <div>
                            <img class="avatar" alt="logo" src="public/img/p1.jpg">
                            <div>
                                <p class="who">Imię Nazwisko</p>
                                <p class="when">when</p>
                            </div>
                        </div>
                        <p>Text of the informationText of the informationText of the information</p>
                    </div>
                </div>
            </div>

            <div class="info-container">
                <div class="top-title">
                    <i class="fas fa-money-bill fa-2x"></i>
                    &nbsp;nowe rachunki&nbsp;
                    <i class="fas fa-money-bill fa-2x"></i>
                </div>
                <div class="info-box">
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

            <div class="info-container">
                <div class="top-title">
                    <i class="far fa-calendar-alt fa-2x"></i>
                    &nbsp;najnowsze wydarzenia&nbsp;
                    <i class="far fa-calendar-alt fa-2x"></i>
                </div>
                <div class="info-box">
                    <div class="event">
                        <div>
                            <img class="avatar" alt="logo" src="public/img/p1.jpg">
                            <div>
                                <p class="who">Imię Nazwisko</p>
                                <p class="date">date</p>
                            </div>
                        </div>
                        <p>Text of the informationText of the informationText of the information</p>
                    </div>
                    <div class="event">
                        <div>
                            <img class="avatar" alt="logo" src="public/img/p1.jpg">
                            <div>
                                <p class="who">Imię Nazwisko</p>
                                <p class="date">date</p>
                            </div>
                        </div>
                        <p>Text of the informationText of the informationText of the information</p>
                    </div>
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