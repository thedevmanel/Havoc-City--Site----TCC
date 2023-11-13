<?php
session_start();

if (!isset($_SESSION['logged_user'])) {
}
else {
    $url = "http://localhost//Havoc-City--Site----TCC/usuario.php?id=" . urlencode($_SESSION['logged_user']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Havoc City</title>
    <link rel="stylesheet" href="css/home.css" type="text/css" />
    <link rel="shortcut icon" href="Imagens/logo.png" type="image/x-icon" />
</head>

<body>
    <!-- box com as imagens -->
    <div class="caixa-imagem-conteudo">
        <!-- <div class="caixa-imagem-fundo"></div> -->
        <div class="box-image-home">
            <img src="Imagens/ImageHomeBack.png" alt="" class="image-home" />
        </div>
        <div class="conteudo-imagem">
            <img src="https://fontmeme.com/permalink/231027/ca25ece0c2fd36fd47485912314e5110.png"
                class="logo-homepage" />
        </div>
    </div>

    <!-- navbar -->
    <!-- <div class="header"> -->
    <nav id="menu-h">
        <div class="logo-jogo-header">
            <img src="https://fontmeme.com/permalink/231027/599d6f4224ce722a5f04605e3e9d1db4.png" class="logo-header" />
        </div>

        <ul>
            <ul>
                <li><a href="index.php">Home </a></li>

                <li><a href="Download.php">Download</a></li>

                <?php
                    if (!isset($_SESSION['logged_user'])) {
                        echo '
                        <li><a href="entrar.php">iniciar sessao</a></li>
                        ';
                    }
                    else {
                        echo '
                        <li><a href="' . $url . '"> perfil </a></li>
                        ';
                    }
                ?>
            </ul>
        </ul>
    </nav>

    <div class="box-conteudo-1">
        <h1 class="titulo-conteudo-homepage"> Como baixar </h1>
    </div>
    <div class="caixa-texto-1">
        <p class="conteudo-texto-1">
            Primeiramente você deverá ir para a página de "Download". Para isso, clique no botão que está na parte mais
            acima da página escrita "Download", ou clicar no link logo abaixo do texto
            <br /><br />
            Para efetuar o download <a href="download.html" class="link-homepage"> Clique Aqui </a>
            <!-- <p>Posição Y: <span id="scrollY">0</span></p>    -->
        </p>

        <div class="conteudo-imagem-texto-1">
            <img src="Imagens\Havoc-City--Menu.png" alt="" class="imagem-conteudo-1" />
        </div>
    </div>

    <!-- seguda box de informações  -->
    <div class="box-conteudo-1">
        <h1 class="titulo-conteudo-homepage"> Sobre o Jogo </h1>
    </div>
    <div class="caixa-texto-1">
        <div class="conteudo-imagem-texto-1">
            <img src="https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg"
                alt="" class="imagem-conteudo-1" />
        </div>
        <p class="conteudo-texto-1">
            Havoc city é um jogo plataforma em 2D com inspirações em jogos retrôs dos anos 80 e 90, com gráficos,
            jogabilidades e sons inspirados nessas épocas.
            Suas principais inspirações foram o Ninja Gaiden (NES), Teenage Mutant Ninja Turtles (NES), Castlevania
            (NES),
            Mega Man (NES e SNES), The Legend of Zelda - A Link to the Past (SNES)...
            <br /><br />

        </p>
    </div>
    <!-- terceira box de informações Sobre -->
    <div class="box-conteudo-1">
        <h1 class="titulo-conteudo-homepage"> Como jogar </h1>
    </div>
    <div class="caixa-texto-1">
        <p class="conteudo-texto-1">
            Para jogar é muito simples, após a instalação do jogo em sua máquina, e, com a gameplay já iniciada, teremos
            que movimentar o personagem [em desenvolvimento...]
            <br /><br />

        </p>

        <div class="conteudo-imagem-texto-1">
            <img src="https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg"
                alt="" class="imagem-conteudo-1" />
        </div>
    </div>
    <div class="footer">
        <div class="info-footer">
            ™ & ©2023 Havoc City. Todos os direitos reservados. Havoc City, Emanuel Rabello, Gustavo Azevedo, <br>Pedro
            Ogata, Filipe Grande sao os desenvolvedores
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
        <script src="js/scrollPage.js"></script>
    </div>
</body>

</html>