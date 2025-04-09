<?php

include "php/controller.php";

$web = new webSite();

session_start();

$login_user_status = isset($_SESSION['logged_user']);
$login_adm_status = isset($_SESSION['logged_adm']);

$url = $login_user_status ? "http://localhost:3000/usuario.php?id=" . urlencode($login_user_status) : "";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Havoc City </title>
    <link rel="stylesheet" href="css/home.css" type="text/css" />
    <link rel="shortcut icon" href="Imagens/logo.png" type="image/x-icon" />
</head>

<body>
    <!-- box de personalização da imagem de título -->
    <div class="caixa-imagem-conteudo">
        <div class="box-image-home">
            <!-- imagem de fundo -->
            <img src="Imagens/ImageHomeComp.png" alt="" class="image-home" />
            <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxgx1RYw0e7qexqAwV4IesJtMeCpgZOHTs7BXV7i2IA99nWzfpgzVjpHxGXOasETaEEPs&usqp=CAU" alt="" class="image-home-cell" /> -->
        </div>
        <div class="conteudo-imagem">
            <!-- imagem do titulo do jogo -->
            <img src="https://fontmeme.com/permalink/231027/ca25ece0c2fd36fd47485912314e5110.png" class="logo-homepage" />
        </div>
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

    <!--   -->
    <div class="box-conteudo-1" data-title>
        <h1 class="titulo-conteudo-homepage"> Como baixar </h1>
    </div>
    <div class="caixa-texto-1" data-animationH="right">
        <p class="conteudo-texto-1">
            Primeiramente você deverá ir para a página de "Download". Para isso, clique no botão que está na parte mais
            acima da página escrita "Download", ou clicar no link logo abaixo do texto
            <br /><br />
            Para efetuar o download <a href="download.php" class="link-homepage"> Clique Aqui </a>
        </p>

        <div class="conteudo-imagem-texto-1">
            <img src="Imagens\Havoc-City--Menu.png" alt="" class="imagem-conteudo-1" />
        </div>
    </div>

    <!-- seguda box de informações  -->
    <div class="box-conteudo-1" data-title>
        <h1 class="titulo-conteudo-homepage"> Sobre o Jogo </h1>
    </div>
    <div class="caixa-texto-1" data-animationH="left">
        <div class="conteudo-imagem-texto-1">
            <img src="Imagens/HavocCity_img2.png" alt="" class="imagem-conteudo-1" />
        </div>

        <p class="conteudo-texto-1">
            Havoc city é um jogo plataforma em 2D com inspirações em jogos retrôs dos anos 80 e 90, com gráficos e
            jogabilidades inspirados nessas épocas.
            Suas principais inspirações foram o Ninja Gaiden (NES), Teenage Mutant Ninja Turtles (NES), Castlevania
            (NES),
            Mega Man (NES e SNES), The Legend of Zelda - A Link to the Past (SNES).
            99% dos sprites do jogo são desenvolvidos pelos prórpios desenvolvedores, a exceção é o primeiro inimigo.
        </p>
    </div>
    <!-- terceira box de informações Sobre -->
    <div class="box-conteudo-1" data-title>
        <h1 class="titulo-conteudo-homepage"> Como jogar </h1>
    </div>
    <div class="caixa-texto-1" data-animationH="right">
        <p class="conteudo-texto-1">
            Para jogar é muito simples, após a instalação do jogo em sua máquina, e, com a gameplay já iniciada, teremos
            que movimentar o personagem com "W", "A" e "D". Será possível realizar o ataque com o "K" e o seu especial com o "ESPAÇO".
            O menu do jogo será controlado pelos botões "W", "A", "S" e "D", e para a confirmação o "ENTER".

        </p>

        <div class="conteudo-imagem-texto-1">
            <img src="Imagens/gameplayImage.png" alt="" class="imagem-conteudo-1" />
        </div>
    </div>
    <div class="footer">
        <div class="info-footer">
            ™ & ©2024 Havoc City. Todos os direitos reservados. Havoc City, Emanuel Rabello
        </div>
        <!-- <div class="icons-footer">
            <span class="box-icones-footer">
                <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"><img
                        src="Imagens/insta.svg" class="icones-footer" alt="Imagem SVG" /></a>
                <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><img
                        src="Imagens/facebook.svg" class="icones-footer" alt="Imagem SVG" /></a>
                <a href="https://www.twitter.com" target="_blank" rel="noopener noreferrer"><img
                        src="Imagens/twitter.svg" class="icones-footer" alt="Imagem SVG" /></a>
            </span>
        </div> -->
    </div>
    <script src="js/scriptHome.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>