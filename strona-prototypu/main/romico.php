<?php

    session_start();

    // Sprawdzanie, czy użytkownik jest zalogowany
    if (!isset($_SESSION['username'])) 
    {
        header("Location: /logowanie.html");
        exit;
    }

    echo "Witaj, " . $_SESSION['username'] . "! Witamy na stronie głównej!";

?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8" /> 

        <link rel="stylesheet" href="styles/romico.css" type="text/css" />
    <title>__proto__Stajnia-APP</title>
</head>

<body>
    <div id="wrapper">
        <div id="all">
            <div id="head">
                <img src="" alt="KJK-Romico" />
                <CENTER>
                    <h1>Stajnia-APP - KJK-Romico</h1>
                    <a href="logout.php">Wyloguj</a>
                </CENTER>
            </div>
            <div id="menu">
                <strong>Menu Użytkownika</strong>
                <?php 
                    echo 'Witaj, '.$_SESSION['username'].'! Jesteś zalogowany!';
                ?> 
                <hr>
                <details>
                    <summary>Ustawienia</summary>
                </details>
                <details>
                    <summary>Linki Pomocnicze</summary>
                </details>
            </div>
            <hr>
            <div id="czat">
                <div id="tytul">
                    <CENTER>
                        <h3>Prosty Czat</h3>
                    </CENTER>
                </div>
                <div id="okno">
                    <?php include 'chat.php'; ?>
                </div>
                <div id="panel">
                    <form action="chat.php" method="POST">
                        <input type="text" name="wiad" id="wiad" placeholder="Wpisz swoją wiadomość" />
                        <input type="submit" value="Wyślij" />
                    </form>
                </div>
            </div>
            <hr>
            <div id="footer">
                <p>Wszelkie prawa zastsrzeżone $copy : 2023r</p>
                <a href="#">Zespół Projektowy</a>
                <a href="#">Nasza Społeczność</a>
                <a href="#">Polityka Prywatności</a>
                <a href="#">O Projekcie</a>
            </div>
        </div>
    </div>
</body>
</html>
