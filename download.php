<?php

include "php/controller.php";

$web = new webSite();

session_start();

$login_user_status = isset($_SESSION['logged_user']);
$login_adm_status = isset($_SESSION['logged_adm']);

$url = $login_user_status ? "http://localhost:3000/usuario.php?id=" . urlencode($login_user_status) : "";

$is_logged = isset($_SESSION['logged_user']) || isset($_SESSION['logged_adm']);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Download Havoc City</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/download.css" type="text/css" />
    <link rel="shortcut icon" href="Imagens/logo.png" type="image/x-icon" />
</head>

<body>
    <div class="conteiner-download">
        <div class="message-download-for-cell">
            aaaaaaa
        </div>


        <!-- menu cellphone -->
    <img src="Imagens/menu_cell_phone.png" alt="Menu" id="menu-cell" onclick="toggleMenu()" />
    <nav id="side-menu">
        <button id="close-menu" onclick="toggleMenu()">X</button>
        <ul>
            <li><a href="index.php">Home </a></li>

            <li><a href="Download.php">Download</a></li>

            <?php $web->loginStatus($login_user_status, $login_adm_status, $url); ?>
        </ul>
    </nav>
    <!-- menu computer -->
    <nav id="menu-h">
        <div class="logo-jogo-header">
            <img src="https://fontmeme.com/permalink/231027/599d6f4224ce722a5f04605e3e9d1db4.png" class="logo-header" />
        </div>

        <ul>
            <ul>
                <li><a href="index.php">Home </a></li>

                <li><a href="Download.php">Download</a></li>

                <?php $web->loginStatus($login_user_status, $login_adm_status, $url); ?>
            </ul>
    </nav>

        <span class="title-download"> Baixe o nosso jogo </span>

        <div id="box-message-download">

        </div>

        <?php echo $is_logged ? '<a href="Jogo/Havoc_City.zip">' : ''; ?>
        <button id="button-download" class="button-download" <?php echo $is_logged ? '' : 'onclick="messageAlert()"'; ?>>
            BAIXAR JOGO
        </button>
        <?php echo $is_logged ? '</a>' : ''; ?>

        <span class="font-download"></span>

        <div class="footer">
            <div class="info-footer">
                ™ & ©2024 Havoc City. Todos os direitos reservados. Havoc City, Emanuel Rabello
            </div>
        </div>
    </div>

    <script src="js/sweetAlert.js"></script>
    <script src="js/scriptDownload.js"></script>
    <script src="js/scripts.js"></script>
    <script>
        function messageAlert() {
            window.location.href = 'http://localhost:3000/cadastro.php';
            <?php
            $_SESSION['no_logged'] = true;
            ?>
        }
    </script>
</body>

</html>